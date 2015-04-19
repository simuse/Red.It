{{-- image --}}
@if (($type === 'image') || ($type === 'gif'))

	<a class="lightbox post-image" href="{{ $post['url'] }}"
		rel="group" target="_blank" title="{{ $post['title'] }}">

		<img src="" data-src="{{ $post['url'] }}"
			alt="{{ $post['title'] }}" itemprop="image">

	</a>

{{-- album --}}
@elseif ($type === 'album')

	<iframe class="post-album" width="100%" height="600" frameborder="0"
		src="{{ $post['url'] }}" itemprop="embedUrl">
	</iframe>

{{-- gifv --}}
@elseif ($type === 'iframe')

	<iframe class="post-iframe" width="100%" height="400" frameborder="0"
		src="{{ $post['url'] }}" itemprop="embedUrl">
	</iframe>

{{-- reddit --}}
@elseif ($type === 'reddit')

	@if (!empty($post['selftext']))
		<div class="selftext" itemprop="text">
			<p>{{ $post['selftext'] }}</p>
		</div>
	@endif

{{-- video --}}
@elseif ($type === 'video')

	<div class="post-video embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="" data-src="{{ $post['url'] }}"
			title="Video Player" itemprop="video embedUrl">
		</iframe>
	</div>

{{-- page --}}
@elseif ($type === 'wikipedia')

	<iframe class="post-album" width="100%" height="400" frameborder="0" src="{{ $post['url'] }}">
	</iframe>

{{-- oembed --}}
@elseif ($type === 'oembed')

	<a class="ui segment post-oembed" href="{{ $post['oembed']->url }}"
		target="_blank" itemprop="associatedArticle">

		<div class="row">

			@if ($post['oembed']->image)
				<div class="col-md-2 col-sm-3 col-xs-4 post-oembed-image">
					<img src="{{ $post['oembed']->image }}" alt="{{ $post['oembed']->title }}">
				</div>
				<div class="col-md-10 col-sm-9 col-xs-8 post-oembed-excerpt">
			@else
				<div class="col-xs-12 post-oembed-excerpt">
			@endif

				<p><strong itemprop="headline">{{ $post['oembed']->title }}</strong></p>
				<p itemprop="description">{{ $post['oembed']->description }}</p>
				<p><small>{{ $post['oembed']->providerName }}</small></p>
			</div>

		</div>

	</a>

{{-- unknown --}}
@else

	<h4>Unknown Post Type</h4>
	<p><a href="{{ $post['url'] }}">{{ $post['url'] }}</a></p>
	<p>{{ $post['domain'] }}</p>

@endif
