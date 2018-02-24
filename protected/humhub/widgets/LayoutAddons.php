<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\widgets;

use humhub\modules\admin\widgets\TrackingWidget;
use humhub\modules\stream\widgets\StreamTopicModal;
use humhub\modules\tour\widgets\Tour;
use Yii;

/**
 * LayoutAddons are inserted at the end of all layouts (standard or login).
 *
 * @since 1.1
 * @author Luke
 */
class LayoutAddons extends BaseStack
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(!Yii::$app->request->isPjax) {
            $this->addWidget(GlobalModal::class);
            $this->addWidget(GlobalConfirmModal::class);

            if(Yii::$app->params['installed']) {
                $this->addWidget(Tour::class);
                $this->addWidget(TrackingWidget::class);
            }

            $this->addWidget(LoaderWidget::class, ['show' => false, 'id' => "humhub-ui-loader-default"]);
            $this->addWidget(StatusBar::class);
            $this->addWidget(BlueimpGallery::class);
            $this->addWidget(MarkdownFieldModals::class);

            if (Yii::$app->params['enablePjax']) {
                $this->addWidget(Pjax::class);
            }
        }
        parent::init();
    }

}
