    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-newspaper"></i> <?= lang('admin_nav_news'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= base_url('admin/news/create'); ?>" class="uk-icon-button"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-middle uk-table-divider uk-table-small">
              <thead>
                <tr>
                  <th class="uk-table-expand"><?= lang('placeholder_title'); ?></th>
                  <th class="uk-width-small"><?= lang('table_header_date'); ?></th>
                  <th class="uk-width-small uk-text-center"><?= lang('table_header_actions'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($newsList) && !empty($newsList)): ?>
                <?php foreach($newsList as $news): ?>
                <tr>
                  <td><?= $news->title ?></td>
                  <td><?= date('Y-m-d', $news->date); ?></td>
                  <td>
                    <div class="uk-flex uk-flex-left uk-flex-center@m uk-margin-small">
                      <a href="<?= base_url('admin/news/edit/'.$news->id); ?>" class="uk-button uk-button-primary uk-margin-small-right"><i class="fas fa-edit"></i></a>
                      <button class="uk-button uk-button-danger" value="<?= $news->id ?>" id="button_delete<?= $news->id ?>" onclick="DeleteNews(event, this.value)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="uk-card-footer">
            <div class="uk-text-right">
              <?php if (isset($newsList) && is_array($newsList)) echo $pagination_links; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      function DeleteNews(e, value) {
        e.preventDefault();

        $.ajax({
          url:"<?= base_url('admin/news/delete'); ?>",
          method:"POST",
          data:{value},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= lang('notification_title_info'); ?>',
                message: '<?= lang('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= lang('notification_title_success'); ?>',
                  message: '<?= lang('notification_news_deleted'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            window.location.replace("<?= base_url('admin/news'); ?>");
          }
        });
      }
    </script>
