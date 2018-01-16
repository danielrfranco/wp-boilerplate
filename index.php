<?php
get_header();

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3
);
$publicaciones_recientes = new WP_Query($args);
?>

<section id="blog">

	<div class="container py-5">
		<div class="row">

			<div class="col-12 col-lg-8">

			<?php
			if (have_posts()):
			?>

			<?php if (is_category()): ?>
			<div class="category-header px-1 px-md-3 mb-4">
				<h1 class="white-bg p-3 p-md-5">Categoría: <?php echo single_cat_title() ?></h1>
			</div>
			<?php elseif (is_tag()): ?>
			<div class="tag-header px-1 px-md-3 mb-4">
				<h1 class="white-bg p-3 p-md-5">Etiqueta: <?php echo single_tag_title() ?></h1>
			</div>
			<?php elseif (is_author()): ?>
			<div class="tag-header px-1 px-md-3 mb-4">
				<div class="info white-bg p-3 p-md-5">
					<h1>Autor: <?php the_author_meta( 'nicename' ) ?></h1>
					<p class="text-justify"><?php the_author_meta( 'description' ) ?></p>
				</div>
			</div>
			<?php endif; ?>

			<?php
				while (have_posts()): the_post();
			?>

				<article class="mb-5 px-1 px-md-3">
					<?php if (has_post_thumbnail()): ?>

					<div class="entry-thumb">
						<img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title() ?>" class="img-fluid img-destacada w-100">
						<?php if (!is_single()): ?>
						<div class="entry-thumb-inner"></div>
						<a href="<?php the_permalink() ?>" class="thumb-icon">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php endif; ?>
					</div>

					<?php endif; ?>

					<div class="post-inner p-3 p-md-5">
						<div class="entry-header">
							<h1 class="entry-title">
								<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
							</h1>
							<div class="entry-meta mb-4">
								<span class="posted-on">
									<a href="<?php the_permalink() ?>" rel="bookmark">
										<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
									</a>
								</span>
								<span class="author">
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="bookmark">
										<?php the_author() ?>
									</a>
								</span>
								<span class="category">
									<?php the_category( ', ' ); ?>
								</span>
							</div>
						</div>
						<div class="entry-content">
							<?php
							if (is_single()) {
								the_content();
							} else {
								the_excerpt();
							}
							?>
						</div>
					</div>
				</article>
			<?php
				endwhile;
			else:
			?>

				<article>
					<h4>Por el momento no hay entradas publicadas en el blog</h4>
				</article>

			<?php
			endif;
			?>
			</div>

			<div class="col-12 col-lg-4 secondary">

				<aside id="search-posts" class="widget mb-5">

					<form action="<?php the_permalink(191) ?>" method="get">
						<input type="search" name="s" placeholder="Buscar" class="w-100">
						<input type="submit" class="d-none">
					</form>

				</aside>

				<aside id="recent-posts" class="widget mb-5">
					<h4 class="widget-title">Entradas recientes</h4>
					<?php if ($publicaciones_recientes->have_posts()): ?>
					<ul class="fa-ul">
						<?php while ($publicaciones_recientes->have_posts()): $publicaciones_recientes->the_post(); ?>
						<li>
							<i class="fa-li fa fa-pencil"></i>
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php
					wp_reset_postdata();
					else:
					?>
					<p class="text-center">No hay entradas todavía</p>
					<?php endif; ?>
				</aside>

				<aside id="categories" class="widget mb-5">
					<h4 class="widget-title">Categorías</h4>
					<?php
					$categorias = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC'
					) );

					if (count($categorias)):
					?>
					<ul class="fa-ul">
						<?php foreach ($categorias as $categoria):?>
						<li>
							<i class="fa-li fa fa-folder-o"></i>
							<a href="<?php echo get_category_link( $categoria->term_id ) ?>"><?php echo $categoria->name ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php else: ?>
					<p class="text-center">No hay categorías todavía</p>
					<?php endif; ?>
				</aside>

				<aside id="tags" class="widget mb-5">
					<h4 class="widget-title">Etiquetas</h4>
					<?php
					$tags = get_tags();
					if (count($tags)):
					?>
					<div class="tag-cloud">
						<?php foreach ($tags as $tag): ?>
						<a href="<?php echo get_tag_link( $tag->term_id ) ?>" class="tag-link <?php echo $tag->slug ?>" title="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
						<?php endforeach; ?>
					</div>
					<?php else: ?>
					<p>No hay etiquetas todavía</p>
					<?php endif; ?>
				</aside>

			</div>

		</div>
	</div>

</section>

<?php get_footer(); ?>
