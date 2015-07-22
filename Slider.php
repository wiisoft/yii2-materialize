<?php
/**
 * Slider renders a slides HTML component.
 *
 * For example:
 *
 * ```php
 * echo Slider::widget([
 *  'items' =>[
 *          [
 *              'img' => "/tmp/1b.jpg",
 *              'imgOptions' => ['alt' => 'Test', 'title' => 'Title', 'class' => 'myClass'],
 *              'title' => "Left Aligned Caption",
 *              'titleOptions' => ['id' => 'id', 'class' => 'titleClass'],
 *              'smallTitle' => "Here's our small slogan.",
 *              'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
 *              'itemOptions' => ['class' => 'center-align'],
 *
 *          ],
 *          [
 *              'img' => "/tmp/2b.jpg",
 *              'title' => "Left Aligned Caption",
 *              'smallTitle' => "Here's our small slogan.",
 *              'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
 *              'itemOptions' => ['class' => 'left-align']
 *          ],
 *          [
 *              'img' => "/tmp/3b.jpg",
 *              'title' => "Left Aligned Caption",
 *              'smallTitle' => "Here's our small slogan.",
 *              'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
 *              'itemOptions' => ['class' => 'right-align']
 *          ],
 *          ],
 *          'options'=>['class'=>'options'], // set this to all widget
 *          'slidesOptions'=>['class'=>'slidesOptions'],
 *
 *  ]);
 * ```
 * @see http://materializecss.com/media.html
 * @author wiisoft <webdev@webmaker.today>
 * @since 1.3
 */
namespace wii\materialize;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Slider
 * @package wii\materialize
 */
class Slider extends Widget
{
    /**
     * @var array the HTML attributes for each slides.
     */
    public $slidesOptions = [];

    /**
     * @var array list of items in the slider widget. Each array element represents a single
     * slider item which can be either a string or an array with the following structure:
     * - img: string, required, the url for image.
     * - imgOptions: array, optional, the HTML attributes of the item's link.
     * - title: string, required, the slides item title.
     * - smallTitle: string, required, the slides item smallTitle.
     * - titleOptions: array, optional, the HTML attributes of the title container (H3).
     * - smallTitleOptions: array, optional, the HTML attributes of the smallTitle container (H5).
     * - itemOptions: array, optional, optional, the HTML attributes of the slides title container.
     */
    public $items = [];

    public function init()
    {
        parent::init();
        $this->clientOptions = false;
    }

    public function run()
    {
        $sliderOptions = ArrayHelper::merge($this->options, []);
        $slidesOptions = ArrayHelper::merge($this->slidesOptions, []);
        Html::addCssClass($sliderOptions,'slider');
        Html::addCssClass($slidesOptions,'slides');

        return Html::tag('div', Html::tag('ul', $this->renderItems(), $slidesOptions), $sliderOptions);
    }

    /**
     * @return string
     */
    protected function renderItems()
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $this->renderItem($item);
        }
        return implode("\n", $items);
    }

    /**
     * @param $item
     * @return string
     */
    protected function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        $title = isset($item['title']) ? Html::encode($item['title']) : '';
        $url = ArrayHelper::getValue($item, 'img', []);
        $smallTitle = isset($item['smallTitle']) ? Html::encode($item['smallTitle']) : '';
        $imgOptions = ArrayHelper::getValue($item, 'imgOptions', []);
        $titleOptions = ArrayHelper::getValue($item, 'titleOptions', []);
        $smallTitleOptions = ArrayHelper::getValue($item, 'smallTitleOptions', []);
        $itemOptions = ArrayHelper::getValue($item, 'itemOptions', []);
        if ($item !== null) {
            Html::addCssClass($itemOptions, 'caption');
        }
        return

            Html::tag('li', Html::img($url, $imgOptions) .
                Html::tag('div',
                    Html::tag('h3', $title, $titleOptions) .
                    Html::tag('h5', $smallTitle, $smallTitleOptions),
                    $itemOptions)
                , []);
    }
}