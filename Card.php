<?php
/**
 * Card renders a card HTML component.
 *
 * For example:
 *
 * ```php
 * echo Card::widget([
 *   'item' => [
 *              'img' => '/tmp/3.jpg',
 *              'imgOptions' => ['class' => 'imgOptions', 'id' => 'imgOptions'],
 *              'cardImgOptions' => ['class' => 'cardImgOptions', 'id' => 'cardImgOptions'],
 *              'cardContentOptions' => ['class' => 'cardContentOptions', 'id' => 'cardContentOptions'],
 *              'cardTitle'=>'Card Title',
 *              'cardTitleOptions'=>['class'=>'cardTitleOptions','id'=>'cardTitleOptions'],
 *              'cardContent' => [
 *                   [
 *                   'tag' => 'p',
 *                   'body' => 'I am a very simple card. I am good at containing small bits of information.
 *                   I am convenient because I require little markup to use effectively.'
 *                   ]
 *
 *              ],
 *              'cardReveal' => [
 *                  [
 *                      'tag' => 'span',
 *                      'activator' => 'true',
 *                      'options' => [],
 *                      'body' => ' Card Title <i class="fa fa-times right"></i>'
 *                  ],
 *                  [
 *                      'tag' => 'p',
 *                      'options' => [],
 *                      'body' => '<a href="#">This is a link</a>'
 *                  ],
 *              ],
 *              'cardAction' => [
 *                   [
 *                   'tag' => 'span',
 *                   'body' => '<a href="#">This is a link</a>'
 *                   ],
 *                  [
 *                  'tag' => 'span',
 *                  'body' => '<a href="#">This is a link</a>'
 *                  ],
 *              ],
 *          ],
 *      'options' => ['class' => 'wow bounceIn']
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
 * Class Card
 * @package wii\materialize
 */
class Card extends Widget
{
    /**
     * @var array list of items options in the card widget.
     * Card item which can be either a string or an array with the following structure:
     * - img: string, required, the url for card image.
     * - cardImgOptions: array, optional, the HTML attributes of the item's link.
     * - cardTitle: string, optional, the card item title.
     * - imgOptions: array, optional, the HTML attributes of the image.
     * - cardContentOptions: array, optional, the HTML attributes of the card content.(CARD-CONTENT)
     * - cardContent: array, required, with the following structure(CARD-CONTENT):
     *      -tag: string, optional,HTML tag under the card content.
     *      -options: array, optional, the HTML attributes under the card content.
     *      -body: string, required, the HTML text under the card content.
     * - cardReveal: array, optional, with the following structure(CARD-REVEAL):
     *      -tag: string, optional,HTML tag under the card-reveal content.
     *      -options: array, optional, the HTML attributes under the card-reveal content.
     *      -body: string, required, the HTML text under the card-reveal content.
     * - cardAction: array, optional, with the following structure(CARD-ACTION):
     *      -tag: string, optional,HTML tag under the card-action content.
     *      -options: array, optional, the HTML attributes under the card-action content.
     *      -body: string, required, the HTML text under the card-action content.
     */
    public $item = [];


    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, 'card');
    }

    public function run()
    {
        return Html::tag('div', $this->renderItem($this->item), $this->options);
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
        $img = ArrayHelper::getValue($item, 'img', []);
        $cardImgOptions = ArrayHelper::getValue($item, 'cardImgOptions', []);
        $imgOptions = ArrayHelper::getValue($item, 'imgOptions', []);
        $cardContentOptions = ArrayHelper::getValue($item, 'cardContentOptions', []);
        $cardContent = ArrayHelper::getValue($item, 'cardContent', []);
        $cardReveal = (ArrayHelper::keyExists('cardReveal', $item)) ? ArrayHelper::getValue($item, 'cardReveal', []) : NULL;
        $cardRevealOptions = (ArrayHelper::keyExists('cardRevealOptions', $item)) ? ArrayHelper::getValue($item, 'cardRevealOptions', []) : NULL;
        $cardAction = (ArrayHelper::keyExists('cardAction', $item)) ? ArrayHelper::getValue($item, 'cardAction', []) : NULL;
        $cardActionOptions = (ArrayHelper::keyExists('cardActionOptions', $item)) ? ArrayHelper::getValue($item, 'cardActionOptions', []) : NULL;
        $cardTitle = (ArrayHelper::keyExists('cardTitle', $item)) ? ArrayHelper::getValue($item, 'cardTitle', []) : NULL;
        $cardTitleOptions = (ArrayHelper::keyExists('cardTitleOptions', $item)) ? ArrayHelper::getValue($item, 'cardTitleOptions', []) : NULL;

        Html::addCssClass($imgOptions, 'activator');
        Html::addCssClass($imgOptions, 'responsive-img');
        Html::addCssClass($cardImgOptions, 'card-image');
        Html::addCssClass($cardContentOptions, 'card-content');
        $addCartTile = '';
        if ($cardTitle !== NULL) {
            Html::addCssClass($cardTitleOptions, 'card-title');
            $addCartTile = Html::tag('span', $cardTitle, $cardTitleOptions);
        }
        $render = Html::tag('div', Html::img($img, $imgOptions) . $addCartTile, $cardImgOptions) .
            Html::tag('div', $this->renderCardContent($cardContent), $cardContentOptions);
        if ($cardReveal !== NULL) {
            Html::addCssClass($cardRevealOptions, 'card-reveal');
            $render .= Html::tag('div', $this->renderCardContent($cardReveal), $cardRevealOptions);
        }
        if ($cardAction !== NULL) {
            Html::addCssClass($cardActionOptions, 'card-action');
            $render .= Html::tag('div', $this->renderCardContent($cardAction), $cardActionOptions);
        }
        return $render;
    }

    protected function renderCardContent($data)
    {
        foreach ($data as $content) {
            if (isset($content['activator'])) {
                Html::addCssClass($content['options'], 'card-title');
                Html::addCssClass($content['options'], 'activator');
            }
            $contents[] = Html::tag((isset($content['tag'])) ? $content['tag'] : 'span', $content['body'], (isset($content['options']) ? $content['options'] : []));
        }
        return implode("\n", $contents);
    }
}