document.addEventListener('DOMContentLoaded', function() {
    // Listen for the custom event 'openFolder'
    elementor.channels.editor.on('openFolder', function() {

        // You can add more custom logic here, such as opening the media uploader
        var fileFrame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });

        // fileFrame.on('select', function() {
        //     var attachment = fileFrame.state().get('selection').first().toJSON();
        //     console.log(attachment.url); // Handle the selected file URL
        // });

        fileFrame.open();
    });
});
