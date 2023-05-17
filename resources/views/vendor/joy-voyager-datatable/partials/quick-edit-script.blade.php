@once('quick-edit' . ($dataId ?? ''))
@push('javascript')

{{-- Quick Edit modal --}}
<div class="modal modal-info fade" tabindex="-1" id="quick_edit_modal{{ $dataId }}" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.edit').' '.$dataType->getTranslatedAttribute('display_name_singular') }}</h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade modal-danger" id="quick_edit_confirm_delete_modal{{ $dataId }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="quick_edit_confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger" id="quick_edit_confirm_delete{{ $dataId }}">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
<script>
    var itemId;
    var quickEditAction = `{{ route('voyager.'.$dataType->slug.'.quick-edit', ['id' => '__ID__']) }}`;
    var quickUpdateFormAction = `{{ route('voyager.'.$dataType->slug.'.quick-update', ['id' => '__ID__']) }}`;
    $('#wrapper{{ $dataId }} #dataTable{{ $dataId }}').on('click', 'td .quick-edit', function (e) {
        const btn = $(this);
        btn.button('loading');
        itemId = btn.data('id');
        $.ajax({
            url: quickEditAction.replace('__ID__', itemId),
            type: 'GET',
            success: function (response) {
                btn.button('reset');

                $('#quick_edit_modal{{ $dataId }} .modal-body').html(response);

                $('#quick_edit_modal{{ $dataId }}').modal('show');

                $('#quick_edit_modal{{ $dataId }} .form-group .datepicker').datetimepicker();

                //Init datepicker for date fields if data-datepicker attribute defined
                //or if browser does not handle date inputs
                $('#quick_edit_modal{{ $dataId }} .form-group input[type=date]').each(function (idx, elt) {
                    if (elt.hasAttribute('data-datepicker')) {
                        elt.type = 'text';
                        $(elt).datetimepicker($(elt).data('datepicker'));
                    } else if (elt.type != 'date') {
                        elt.type = 'text';
                        $(elt).datetimepicker({
                            format: 'L',
                            extraFormats: [ 'YYYY-MM-DD' ]
                        }).datetimepicker($(elt).data('datepicker'));
                    }
                });

                $('#quick_edit_modal{{ $dataId }} select.select2').select2({
                    dropdownParent: $('#quick_edit_modal{{ $dataId }}'),
                    width: '100%'
                });
                $('#quick_edit_modal{{ $dataId }} select.select2-ajax').each(function() {
                    $(this).select2({
                        dropdownParent: $('#quick_edit_modal{{ $dataId }}'),
                        width: '100%',
                        tags: $(this).hasClass('taggable'),
                        createTag: function(params) {
                            var term = $.trim(params.term);

                            if (term === '') {
                                return null;
                            }

                            return {
                                id: term,
                                text: term,
                                newTag: true
                            }
                        },
                        ajax: {
                            url: $(this).data('get-items-route'),
                            data: function (params) {
                                var query = {
                                    search: params.term,
                                    type: $(this).data('get-items-field'),
                                    method: $(this).data('method'),
                                    id: $(this).data('id'),
                                    page: params.page || 1
                                }
                                return query;
                            }
                        }
                    });

                    $(this).on('select2:select',function(e){
                        var data = e.params.data;
                        if (data.id == '') {
                            // "None" was selected. Clear all selected options
                            $(this).val([]).trigger('change');
                        } else {
                            $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected','selected');
                        }
                    });

                    $(this).on('select2:unselect',function(e){
                        var data = e.params.data;
                        $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',false);
                    });

                    $(this).on('select2:selecting', function(e) {
                        if (!$(this).hasClass('taggable')) {
                            return;
                        }
                        var $el = $(this);
                        var route = $el.data('route');
                        var label = $el.data('label');
                        var errorMessage = $el.data('error-message');
                        var newTag = e.params.args.data.newTag;

                        if (!newTag) return;

                        $el.select2('close');

                        $.post(route, {
                            [label]: e.params.args.data.text,
                            _tagging: true,
                        }).done(function(data) {
                            var newOption = new Option(e.params.args.data.text, data.data.id, false, true);
                            $el.append(newOption).trigger('change');
                        }).fail(function(error) {
                            toastr.error(errorMessage);
                        });

                        return false;
                    });
                });

                tinymce.remove('textarea.richTextBox');

                var additionalConfig = {
                    selector: 'textarea.richTextBox',
                }

                // $.extend(additionalConfig, {!! json_encode($options->tinymceOptions ?? '{}') !!})

                tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));

                $('#quick_edit_modal{{ $dataId }} #slug').slugify();

                $('#quick_edit_modal{{ $dataId }} input[data-slug-origin]').each(function(i, el) {
                    $(el).slugify();
                });

                if(typeof helpers.initSelect2MorphToType === 'function') {
                    helpers.initSelect2MorphToType('select.select2-morph-to-type');
                } else {
                    console.warn('initSelect2MorphToType is not available yet.');
                }
                if(typeof helpers.initSelect2MorphToAjax === 'function') {
                    helpers.initSelect2MorphToAjax('select.select2-morph-to-ajax');
                } else {
                    console.warn('initSelect2MorphToAjax is not available yet.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                btn.button('reset');
                var err = JSON.parse(jqXHR.responseText);
                toastr.error(err.message);
            }
        });

        return false;
    });
    $('#quick_edit_modal{{ $dataId }}').on('click', 'form.form-edit-add button[type="submit"]', function (e) {
    // $('#quick_edit_modal{{ $dataId }} form.form-edit-add').submit(function (e) {
        $('#quick_edit_modal{{ $dataId }} form.form-edit-add button[type="submit"]').data(
            'loading-text',
            "<i class='fa fa-spinner fa-spin'></i> Saving..."
        ).button('loading');
        e.preventDefault(); // avoid to execute the actual submit of the form.
        // $('#quick_edit_modal{{ $dataId }} .modal-body form');
        // $.post(quickUpdateFormAction.replace('__ID__', itemId), {}, function (response) {

        //     // $('#quick_edit_modal{{ $dataId }} .modal-body').html(response);
        // });

        // $('#quick_edit_modal{{ $dataId }}').modal('show');
        // return false;

        var form = $('#quick_edit_modal{{ $dataId }} form.form-edit-add');
        var actionUrl = form.attr('action');
        $('.alert', form).remove();

        var formData = new FormData($('#quick_edit_modal{{ $dataId }} form.form-edit-add')[0]);
        
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            success: function(response)
            {
                $('.alert', form).remove();
                $('#quick_edit_modal{{ $dataId }} form.form-edit-add button[type="submit"]').button('reset');
                $('#quick_edit_modal{{ $dataId }}').modal('hide');
                $('#wrapper{{ $dataId }} #dataTable{{ $dataId }}').DataTable().ajax.reload();
                toastr.success(response.message);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('.alert', form).remove();
                $('#quick_edit_modal{{ $dataId }} form.form-edit-add button[type="submit"]').button('reset');
                var err = JSON.parse(jqXHR.responseText);
                let errorsHtml = '';
                for(let errorKey in err.errors) {
                    errorsHtml += '<li>' + err.errors[errorKey].join(',') + '</li>';
                }
                if(!errorsHtml) {
                    errorsHtml = err.message;
                }
                const errorHtml = `<div class="alert alert-danger">
                    <ul>
                            ${errorsHtml}
                    </ul>
                </div>`;

                form.prepend(errorHtml);
            }
        });
        return false;
    });
    var params = {};
    var $file;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            // Using native confirm as confirm modal inside modal not working
            if(confirm(`{{ __('voyager::generic.are_you_sure_delete') }} ${params.filename}`)) {
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });
            }
            // $('.quick_edit_confirm_delete_modal{{ $dataId }} .quick_edit_confirm_delete_name').text(params.filename);
            // $('#quick_edit_confirm_delete_modal{{ $dataId }}').modal('show');

        };
    }

    $('document').ready(function () {
        // $('.toggleswitch').bootstrapToggle();

        // @if ($isModelTranslatable)
        //     $('.side-body').multilingual({"editing": true});
        // @endif

        // $('#quick_edit_modal{{ $dataId }} .side-body input[data-slug-origin]').each(function(i, el) {
        //     $(el).slugify();
        // });

        $('#quick_edit_modal{{ $dataId }}').on('click', '.form-group .remove-multi-image', deleteHandler('img', true));
        $('#quick_edit_modal{{ $dataId }}').on('click', '.form-group .remove-single-image', deleteHandler('img', false));
        $('#quick_edit_modal{{ $dataId }}').on('click', '.form-group .remove-multi-file', deleteHandler('a', true));
        $('#quick_edit_modal{{ $dataId }}').on('click', '.form-group .remove-single-file', deleteHandler('a', false));

        $('#quick_edit_confirm_delete{{ $dataId }}').on('click', function(){
            $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                if ( response
                    && response.data
                    && response.data.status
                    && response.data.status == 200 ) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() { $(this).remove(); })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#quick_edit_confirm_delete_modal{{ $dataId }}').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
@endonce