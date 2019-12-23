define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function (_, uiRegistry, select) {
    'use strict';

    return select.extend({

        /**
         * Hide/show fields on video tab at backend
         */
        onUpdate: function () {

            var videoEnabled = uiRegistry.get('index = Tekglide_video_enabled'); // toggle yes/no
            var videoTitle = uiRegistry.get('index = Tekglide_video_title');
            var videoEmbedcode = uiRegistry.get('index = Tekglide_video_embedcode');
            var videoLink = uiRegistry.get('index = Tekglide_video_link');
            var videoLinkLabel = uiRegistry.get('index = Tekglide_video_label');
            var videoDescription = uiRegistry.get('index = Tekglide_video_description');
            // var x = document.getElementsByClassName("Tekglide_video_description");

            if (videoEnabled.getInitialValue() != 0) {
                videoTitle.show();
                videoEmbedcode.show();
                videoLink.show();
                videoLinkLabel.show();
                videoDescription.show();
            } else {
                videoTitle.hide();
                videoEmbedcode.hide();
                videoLink.hide();
                videoLinkLabel.hide();
                videoDescription.hide();
                // videoDescription.style.display = 'none';
            }

        }
    });
});
