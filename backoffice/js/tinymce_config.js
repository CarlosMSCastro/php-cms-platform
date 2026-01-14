/**
 * TinyMCE - Configuração com Upload e Alinhamento de Imagens
 */

document.addEventListener('DOMContentLoaded', function() {
    
    tinymce.init({
        selector: 'textarea.ckeditor, textarea[id^="editor-"]',
        
        // Plugins essenciais
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        
        // Barra de ferramentas
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        
        // Configuração de imagens
        image_caption: true,
        image_advtab: true,
        
        // Upload de imagens
        images_upload_url: '/comunicacoes/backoffice/tinymce_upload.php',
        automatic_uploads: true,
        
        images_upload_handler: function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/comunicacoes/backoffice/tinymce_upload.php');
                
                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };
                
                xhr.onload = function() {
                    if (xhr.status === 403) {
                        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                        return;
                    }
                    
                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }
                    
                    const json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    // DEBUG - mostra o que recebeu
                    console.log('📤 Upload response:', json);
                    console.log('📍 Image URL:', json.location);

                    resolve(json.location);
                };
                
                xhr.onerror = function () {
                    reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };
                
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                
                xhr.send(formData);
            });
        },
        
        // Configurações gerais
        height: 500,
        menubar: false,
        statusbar: true,
        branding: false,
        
        // Configurações de conteúdo
        content_style: 'body { font-family: Proxima Nova ExCn Rg, Arial, sans-serif; font-size: 16px; }',
        // Forçar URLs absolutas
        relative_urls: false,
        remove_script_host: false,
        document_base_url: 'http://localhost/',
        // Permitir redimensionar imagens
        object_resizing: true,
        resize_img_proportional: false,
        
        // Configurações de alinhamento
        alignment_formats: 'left center right justify',
        
        // Português
        language: 'pt_PT',
        language_url: 'https://cdn.tiny.cloud/1/no-api-key/tinymce/7/langs/pt_PT.js'
    });
});