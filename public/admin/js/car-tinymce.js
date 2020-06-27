function _saveImage(file,callback){
          var data = new FormData();
              data.append('image', file);
              data.append('_token', '{{csrf_token()}}');
              // data.append('type', '{{$type}}');
              // data.append('id', '{{$id}}')
              data.append('image_name' , file.name);
              $.ajax({
                  data: data,
                  type: 'POST',
                  url: '/admin/upload/new/image/cars',
                  cache: false,
                  contentType: false,
                  processData: false
              }).done(function(imagePath){
                  callback(imagePath);
              });
      }

      var default_options = {
          selector: '.tinymce',
          height: 500,
          theme: 'modern',
          plugins: [
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons paste textcolor colorpicker textpattern imagetools codesample toc help'
          ],
          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview | forecolor backcolor emoticons | help',
          extended_valid_elements: 'span',
          // image_advtab: true,
          file_picker_callback: function(callback, value, meta){
              console.log(meta.filetype)
              switch(meta.filetype){
                  case 'image':
                      $('#upload').trigger('click');
                      $('#upload').on('change', function() {
                          var file = this.files[0];
                          var reader = new FileReader();
                          reader.onload = function(e) {
                              _saveImage(file,function(imagePath){
                                  callback(imagePath, {
                                      alt: ''
                                  });
                              });
                          };
                          reader.readAsDataURL(file);
                      });
                  break;
                  default:
                      alert('Unfortunately TinyMCE doesn\'t allow this action. Sorry for the inconvenience.');
                  break;
              }
          },
          media_alt_source: false,
          media_poster: false,
          /*templates: [
              { title: 'Test template 1', content: 'Test 1' },
              { title: 'Test template 2', content: 'Test 2' }
          ],*/
          content_css: []
      }
      // options_override = JSON.parse('{!! json_encode($options_override) !!}');

      // console.log(default_options,options_override)

      // $.extend(default_options);

      tinymce.init(default_options);
