@extends('dashboard.template.home')
@section('subjudul', 'Update Announcement')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ $error }}
                </div>
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ Session('success') }}
            </div>
        </div>
    @endif

    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $announcement->title }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Add Announcement</button>
        </div>
    </form>
@endsection

@section('add-script')
    <script>
        (function(factory) {
            /* global define */
            if (typeof define === 'function' && define.amd) {
                // AMD. Register as an anonymous module.
                define(['jquery'], factory);
            } else if (typeof module === 'object' && module.exports) {
                // Node/CommonJS
                module.exports = factory(require('jquery'));
            } else {
                // Browser globals
                factory(window.jQuery);
            }
        })(function($) {
            $.extend($.summernote.plugins, {
                mergeCell: function(context) {
                    var self = this,
                        ui = $.summernote.ui,
                        options = context.options,
                        $editor = context.layoutInfo.editor,
                        $editable = context.layoutInfo.editable;
                    editable = $editable[0];

                    context.memo('button.mergeCell', function() {
                        return ui
                            .buttonGroup([
                                ui.button({
                                    contents: '<b>Merge cell<b>', //ui.icon(options.icons.bold),
                                    tooltip: 'Merge cell',
                                    click: function(e) {
                                        self.toggleMergeCell();
                                    }
                                })
                            ])
                            .render();
                    });
                    let td;
                    $('body').on('click', 'td', function() {
                        td = $(this);
                        return td;
                    });
                    $('body').on('click', 'th', function() {
                        td = $(this);
                        return td;
                    });
                    this.toggleMergeCell = function() {
                        let pr = prompt('How many?');
                        td.attr('colspan', pr);
                        if (pr == '' || pr == undefined || pr == '1' || pr == '0') {
                            return;
                        } else {
                            for (let i = 1; pr > i; i++) {
                                td.next().remove();
                            }
                        }
                    };
                }
            });
        });
        (function(factory) {
            /* global define */
            if (typeof define === 'function' && define.amd) {
                // AMD. Register as an anonymous module.
                define(['jquery'], factory);
            } else if (typeof module === 'object' && module.exports) {
                // Node/CommonJS
                module.exports = factory(require('jquery'));
            } else {
                // Browser globals
                factory(window.jQuery);
            }
        })(function($) {
            $.extend($.summernote.plugins, {
                mergeRow: function(context) {
                    var self = this,
                        ui = $.summernote.ui,
                        options = context.options,
                        $editor = context.layoutInfo.editor,
                        $editable = context.layoutInfo.editable;
                    editable = $editable[0];

                    context.memo('button.mergeRow', function() {
                        return ui
                            .buttonGroup([
                                ui.button({
                                    contents: '<b>Merge row<b>', //ui.icon(options.icons.bold),
                                    tooltip: 'Merge row',
                                    click: function(e) {
                                        self.toggleMergeRow();
                                    }
                                })
                            ])
                            .render();
                    });
                    let td;
                    let tr;

                    $('body').on('click', 'td', function() {
                        td = $(this);
                        return td;
                    });
                    $('body').on('click', 'tr', function() {
                        tr = $(this);

                        return tr;
                    });

                    this.toggleMergeRow = function() {
                        let pr = prompt('How many?');
                        td.attr('rowspan', pr);
                        let $num = tr.nextAll();
                        var arr = [].slice.call($num);
                        if (pr == '' || pr == undefined || pr == '1' || pr == '0') {
                            return;
                        } else {
                            for (i = 0; pr - 1 > i; i++) {
                                arr[i].firstChild.remove();
                            }
                        }
                    };
                }
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['height', ['height']],
                ],
                popover: {
                    table: [
                        ['custom', ['tableHeaders', 'mergeCell', 'mergeRow']],
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]
                    ]
                },
                tabDisable: true,
                codeviewFilter: false,
                codeviewIframeFilter: true
            });
        });
        $(document ).ready(function(){
        var content = {!! json_encode($announcement->description) !!};
        $('#description').summernote('code',content);
        });

    </script>
@endsection
