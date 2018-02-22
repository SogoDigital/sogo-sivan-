<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h1><?php esc_attr_e( 'Animated image Gallery', 'wp_admin_style' ); ?></h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">



            </div>
            <!-- post-body-content -->

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <!-- Image upload -->
                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span><?php esc_attr_e( 'Main Content Header', 'wp_admin_style' ); ?></span>
                        </h2>

                        <div class="inside">

                            <form action="" method="post" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">בחר תמונות</label>
                                    <input type="file" multiple="" class="form-control" name="matat_galery[]" id="">
                                </div>
                                <button type="submit" class="button-primary">Submit</button>
                            </form>

                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->




                    <!-- Image setting -->
                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span><?php esc_attr_e( 'Resolutions Setting', 'wp_admin_style' ); ?></span>
                        </h2>

                        <div class="inside">
                            <?php $settings= get_option('_matat_gallery_plugin_settings'); ?>
                            <form action="" method="post" role="form">

                            	<table>
                                    <tr>
                                        <td><h4>1024PX</h4></td>
                                        <td>rows:<input type="number" value="<?php echo $settings['1024_row'] ?>" class="small-text" name="r_1024" /></td>
                                        <td>columns:<input type="number" value="<?php echo $settings['1024_columns'] ?>" class="small-text" name="c_1024"/></td>
                                    </tr>
                                </table>
                            	<button type="submit" name="settings" class="btn btn-primary">Submit</button>
                            </form>


                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->



                    <!-- image gallery -->
            <?php
            $img = get_option('_matat_gallery_plugin', false);
            if($img){ ?>
                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span><?php esc_attr_e( 'Main Content Header', 'wp_admin_style' ); ?></span>
                        </h2>

                        <div class="inside inside_gallery">
                            <section class="main">

                                    <ul>
                                        <?php
                                        foreach ($img as $src) {
                                            ?>
                                            <li><span class="delete" data-id="<?php echo $src?>">X</span><img src="<?php echo wp_get_attachment_url($src); ?>" width="150" height="150"></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>

                            </section>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->
            <?php } ?>

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>
            <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span><?php esc_attr_e(
                                    'Sidebar Content Header', 'wp_admin_style'
                                ); ?></span></h2>

                        <div class="inside">
                            <p><?php esc_attr_e( 'Everything you see here, from the documentation to the code itself, was created by and for the community. WordPress is an Open Source project, which means there are hundreds of people all over the world working on it. (More than most commercial platforms.) It also means you are free to use it for anything from your cat’s home page to a Fortune 500 web site without paying anyone a license fee and a number of other important freedoms.', 'wp_admin_style' ); ?></p>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables -->

            </div>
            <!-- #postbox-container-1 .postbox-container -->

        </div>
        <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div>
    <!-- #poststuff -->

</div> <!-- .wrap -->
