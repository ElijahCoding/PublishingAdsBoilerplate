<template>
  <form method="post" v-if="loaded">
      <div id="dropin"></div>
      <button class="btn btn-primary">Complete</button>
      <input type="hidden" name="_token" v-bind:value="csrfToken">
  </form>
  <div v-else>Loading payment form</div>
</template>

<script>
    export default {
        data () {
          return {
            loaded: false,
            csrfToken: window.Laravel.csrfToken
          }
        },

        mounted() {

        }
    }
</script>
