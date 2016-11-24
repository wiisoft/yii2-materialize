<?php

namespace wii\materialize;

use yii\helpers\Html;

/**
 * Chips renders a materialize chip with image and close icon.
 *
 * For example,
 *
 * ```php
 * echo Chips::widget([
 *     'label' => 'Chip',
 *     'options' => ['class' => 'new'],
 *     'img' => 'url',
 *     'imgOptions' => ['alt' => 'url'],
 *     'closeIcon' => 'close'
 * ]);
 * ```
 * @see http://materializecss.com/chips.html
 * @author InsaneSkull
 */
 
class Chips extends Widget
{
	
    /**
     * @var string the tag to use to render the chip
     */
    public $tagName = 'div';
    
    /**
     * @var string the chip label
     */
    public $label = '';
    
    /**
     * @var boolean whether the label should be HTML-encoded.
     */
    public $encodeLabel = true;
    
    /**
     * @var string default css class for chip
     */
    public $defaultClass = 'chip';
    
   /**
    * @var array the HTML attributes of the chip.
    */
   public $options = [];
   	
   /**
    * @var string the image for chip.
    */
   public $img ='';
   
   /**
    * @var array the HTML attributes of the image.
    */
   public $imgOptions = [];
   
   /**
    * @var string close icon for the chip.
    */
   public $closeIcon = '';
   

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();  
        Html::addCssClass($this->options, $this->defaultClass);
    }
    
    /**
     * Renders the widget.
     */
    public function run()
    {
    	echo Html::beginTag($this->tagName, $this->options);
    	$this->renderImage($this->img);
    	echo ($this->encodeLabel) ? Html::encode($this->label) : $this->label;
    	$this->renderCloseIcon($this->closeIcon);
        echo Html::endTag($this->tagName);
    }
    
    /**
     * Renders the Image.
     */
    private function renderImage($image)
    {
    	if(!empty($image))
    	{
    		echo Html::img($image, $this->imgOptions);
    	}
    }
    
    /**
     * Renders the Close Icon.
     */
    private function renderCloseIcon($icon)
    {
    	if($icon)
    	{
    		echo Html::tag('i', $icon,['class' => 'material-icons']);
    	}
    
    }
}
?>
