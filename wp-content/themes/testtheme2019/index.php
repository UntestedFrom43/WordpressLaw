    <!-- Стартовый шаблон -->
    <?php get_header(); ?>
    <!-- <h2>Main</h2> -->
    <div class="container">
        <div class="row">
        <!-- Заготовка под сайдбар -->
        <div class="col">
            <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Посты -->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
            <!-- Title -->
                <h5 class="card-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h5>
            </div>
            <!-- <img src="..." class="card-img-top" alt="Место для миниатюры"> -->
            <!-- Карточки постов -->
                <div class="card-body">
            <!-- Функция на проверку прикрепления img -->
            <?php if (has_post_thumbnail()) : ?>
            <!-- Функция вывода -->
                <?php the_post_thumbnail('thumbnail', array('class' => 'float-left mr-3')); ?>
            <!-- Проверяем -->
                <?php else: ?>
                <!-- По умолчанию при отсутствии full-версии -->
                <img src="https://picsum.photos/id/1/150/150" width="150" height="150" alt="demo_img" class="float-left mr-3">
            <?php endif; ?>            
                <!-- Линки -->
                <p class="card-text"><?php the_excerpt(); ?></p>
                </div>
            <!-- Footer -->
            <div class="card-footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('Перейти в статью', 'testtheme2019')?></a>
            </div>
            </div>
        </div>
            <?php endwhile; ?>
            <!-- Навигация-->
            <?php the_posts_navigation(array(
                'show_all' => true,
                'end_size' => 2,
                'mid_size' => 2,
                'type' => 'list'
            )); ?>
            <?php else: ?>
            <!-- Постов нет -->
            <p>Постов нет :(</p>
            <?php endif; ?>   
            </div>
        </div>
        <!-- Колонки sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>

    <!-- Выборка категорий -->
    <?php 
    //$query = new WP_Query('cat=54&posts_per_page=-1'); 
    $query = new WP_Query(array(
        'category_name' => 'uncategorized',
        //'cat' => '54',
        'posts_per_page'=> '-1',
        'orderby' => 'title',
        'order' => 'DESC',
    )); 
    ?>
    <!-- Посты -->
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php the_title();?></h5>
                </div>
            </div>
        <?php endwhile; ?>
    <!-- Навигация -->
        <?php else: ?>
    <!-- Посты не найдены -->
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php get_footer();?>