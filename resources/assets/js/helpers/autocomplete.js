import autocomplete from 'autocomplete-js'
import algolia from 'algolia'

var index = algolia('6UQC00A0LG', 'b1d7961bd271fd8ee59febe3b6f16fcd')

export const listingsautocomplete = (selector) => {
  var listings = index.initIndex('listings')

  return autocomplete(selector, {}, [
    {
      source: autocomplete.sources.hits(listings, {hitsPerPage: 5}),
      templates: {
        suggestion: (suggestion) {
          console.log(suggestion)
        }
      },
      displayKey: 'title',
      empty: '<div class="aa-empty">No listings found.</div>'
    }
  ])
}
