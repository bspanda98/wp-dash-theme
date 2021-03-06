<?php 
/* Template Name: Roadmap/timeline Page */ 
get_header(); ?>


<div id="main" class="page-roadmap">

<div class="halfbanner bg-gradient-h">
	<div class="container d-flex align-items-center">
		<div class="caption text-center">
		<?php 
			if ( empty( get_the_content() ) ){  
				the_title();
			}
			else {
				the_content();
			}
		?>
		</div>
	</div>
</div>
<style type="text/css">
	.halfbanner .caption h1 {
		color: #fff;
	}
	header .lang path, header .lang polygon,
	header .logo path, header .logo polygon {
		fill: #fff!important;
	}
	header a, header a:hover {
		color: #fff;
	}
</style>


	
<section class="block block-roadmap bg-light">
	<div class="container">
		<div class="roadmap-container">
			<div class="top">
				<?php if ( get_field( "top_image" )!='' ){
					echo "<img src='". get_field( "top_image" ) ."' class='img-fluid'>";
				} ?>
			</div>

			<!-- Timeline -->
			<div class="roadmap-items">

				<?php 
				$count = 0;
					while( have_rows('roadmap') ): the_row(); 
						$count++;
				?>
				<div class="roadmap-item <?php echo get_sub_field('point_complete')=='yes'?"complete":''; ?> <?php echo get_sub_field('point_type')?> <?php echo get_sub_field('point_type')=='info'?get_sub_field('point_align'):''; ?>">
					<div class="caption" data-target="#roadmap-info-<?php echo $count ?>" data-toggle="modal">
						<h3><?php echo get_sub_field('point_title')?></h3>

						<?php if (get_sub_field('point_type')=='info'){ ?>
							<div class="tags">
								<div class="tag-bg">
									<?php echo get_sub_field('point_date'); ?>	
								</div>
								<div class="status">
									<?php echo get_sub_field('point_complete')=='yes'?"complete":''; ?>	
								</div>
							</div>
							<?php echo get_sub_field('point_description')?>

							<span class="icon-inline sm gray arrow">
								<?php get_template_part('inc/caret.svg'); ?>
							</span>
						<?php } ?>
					</div>
					<?php if (get_sub_field('point_type')=='info'){ ?><div class="dot"></div><?php } ?>
				</div>
				<?php endwhile; ?>				
			</div>

			<!-- End timeline -->
			<div class="bottom">
				<?php if ( get_field( "bottom_image" )!='' ){
					echo "<img src='". get_field( "bottom_image" ) ."' class='img-fluid'>";
				} ?>
			</div>
		</div>
	</div>
</section>

<?php 
$count = 0;
while( have_rows('roadmap') ): the_row(); 
	$count++;
	if (get_sub_field('point_type')=='info'){
?>
<div class="modal fade roadmap-modal <?php echo get_sub_field('point_complete')=='yes'?"complete":''; ?>" id="roadmap-info-<?php echo $count ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<a data-dismiss="modal" aria-label="Close" class="modal-close-btn"><span class="icon-el remove"></span></a>
    	<div class="content">
    		<div class="tags">
				<div class="tag-bg">
					<?php echo get_sub_field('point_date'); ?>	
				</div>
				<div class="status">
					<?php echo get_sub_field('point_complete')=='yes'?"complete":''; ?>	
				</div>
			</div>
    		<div class="row">
    			<div class="col-lg-4 border-right">
					<h3><?php echo get_sub_field('point_title')?></h3>
    				<div class="richtext text-sm">
	    				<?php echo get_sub_field('point_description')?>
	    			</div>
    			</div>    			
    			<div class="col-lg-8">
    				<div class="richtext text-sm px-lg-3">
			    		<?php echo get_sub_field('point_content')?>
			    	</div>
    			</div>
    		</div>
    	</div>
    </div>
  </div>
</div>
<?php } endwhile; ?>				


</div>

<?php get_footer(); ?>
