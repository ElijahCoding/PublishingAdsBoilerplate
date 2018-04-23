<div class="media">
  <div class="media-body">
    <h5><strong><a gref="">{{ $listing->title }}</a></strong></h5>

    <ul class="list-inline">
      <li><time>{{ $listing->created_at->diffForHumans() }}</time></li>
      <li>{{ $listing->user->name }}</li>
    </ul>
  </div>
</div>
