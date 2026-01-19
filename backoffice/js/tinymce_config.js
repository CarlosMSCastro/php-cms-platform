document.addEventListener('DOMContentLoaded', function() {
    
    tinymce.init({
        selector: 'textarea.ckeditor, textarea[id^="editor-"]',
        
        entity_encoding: 'raw',
        encoding: 'UTF-8',
        
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        
        image_caption: true,
        image_advtab: true,
        
        // CAMINHOS RELATIVOS
        images_upload_url: 'tinymce_upload.php',  // ← SEM barra inicial
        automatic_uploads: true,
        
        images_upload_handler: function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'tinymce_upload.php');  // ← SEM barra inicial
                
                // ... resto do código de upload igual ...
                
                xhr.onload = function() {
                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }
                    
                    const json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        reject('Invalid JSON');
                        return;
                    }

                    resolve(json.location);
                };
                
                xhr.onerror = function () {
                    reject('Upload failed');
                };
                
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            });
        },
        
        height: 500,
        menubar: false,
        statusbar: true,
        branding: false,
        object_resizing: true,
        resize_img_proportional: false,
        
        // CAMINHOS RELATIVOS
        relative_urls: true,  // ← MUDA para true
        remove_script_host: false,
        
        content_style: 'body { font-family: Proxima Nova ExCn Rg, Arial, sans-serif; font-size: 16px; }',
        
        language: 'pt_PT',
        language_url: 'https://cdn.tiny.cloud/1/no-api-key/tinymce/7/langs/pt_PT.js',
        
        setup: function(editor) {
            editor.on('init', function() {
                var content = editor.getContent();
                content = content.replace(/data-start="[^"]*"/g, '');
                content = content.replace(/data-end="[^"]*"/g, '');
                editor.setContent(content);
            });
        }
    });
});