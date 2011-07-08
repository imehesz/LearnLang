<?php Yii::app()->clientScript->registerCoreScript( 'jquery' ); ?>

<?php if( ! empty( $abc ) ) : ?>
    <?php foreach( $abc as $letter ) : ?>
        <div id="flipbox-<?php echo $letter->id; ?>" class="card-wrapper">
            <div id="front-side-<?php echo $letter->id; ?>">
                <h1><?php echo mb_strtoupper( $letter->letter, 'UTF-8' ); ?></h1>
                <?php
                    // let's get a word with that letter ...
                    $word = Word::model()->find( array( 'condition' => 'alphabet_id=:letter_id', 'order' => 'RANDOM()', 'params' => array( ':letter_id' => $letter->id ) ) ); 
                    if( $word ) :
                ?>
                        <div style="height:125px;overflow:hidden;">
                            <?php 
                                echo CHtml::image( 
                                        Yii::app()->request->baseUrl . '/imageDisplay.php/' . $word->picture . '?image=' . Yii::app()->request->baseUrl . '/files/' . $word->picture . '&width=100' ); 
                            ?>
                        </div>
                        <div><h2><?php echo $word->word; ?></h2></div>
                    <?php endif; ?>
            </div>
            <div id="back-side-<?php echo $letter->id; ?>" style="display:none;">
                <h1><?php echo mb_strtoupper( $letter->letter, 'UTF-8' ); ?></h1>
                <?php if( $word ) : ?>
                    <?php if( $word->video ) : ?>
                        <?php
                            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                                        'id'=>'mydialog' . $word->id,
                                        // additional javascript options for the dialog plugin
                                        'options'=>array(
                                            'title'=>'',
                                            'autoOpen'=>false,
                                            'modal'=>true,
                                            'width' => '455px'
                                            ),
                                        ));
                        ?>
                            <iframe width="425" height="349" src="<?php echo $word->video ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
                        <?php
                            $this->endWidget('zii.widgets.jui.CJuiDialog');

                            // the link that may open the dialog
                            echo CHtml::link('Videó', '#', array(
                                        'onclick'=>'$("#mydialog' . $word->id . '").dialog("open"); return false;',
                                        ));
                        ?>
                    <?php endif; ?>
                    <p>
                        <h2><?php echo $word->word . '<br />= <br />' .$word->in_english; ?></h2>
                    </p>
                <?php endif; ?>
            </div>
        </div>


        <?php Yii::app()->clientScript->registerScript( 'flipper_' . $letter->id, "jQuery( 'document' ).ready(function(){
        flip_status_" . $letter->id . " = 'frontside'
        jQuery( '#flipbox-" . $letter->id . "' ).click( function(){
            if( flip_status_" . $letter->id . " == 'frontside' )
            {
                $('#flipbox-" . $letter->id . "').flip({
                    direction:'lr',
                    content:jQuery('#back-side-" . $letter->id . "').html(),
                    color: '#efefef',
                    speed:100
                });
                flip_status_" . $letter->id . " = 'backside'
            }
            else
            {
                $('#flipbox-" . $letter->id . "').revertFlip();
                flip_status_" . $letter->id .  " = 'frontside'
            }
        });
    });", CClientScript::POS_END  ); ?>
    <?php endforeach; ?>
<?php endif; ?>
