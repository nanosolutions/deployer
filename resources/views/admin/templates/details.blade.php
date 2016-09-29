@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#hooks" data-toggle="tab"><span class="fa fa-terminal"></span> {{ Lang::get('commands.label') }}</a></li>
                    <li><a href="#variables" data-toggle="tab"><span class="fa fa-usd"></span> {{ Lang::get('variables.label') }}</a></li>
                    <li><a href="#shared-files" data-toggle="tab"><span class="fa fa-folder"></span> {{ Lang::get('sharedFiles.label') }}</a></li>
                    <li><a href="#config-files" data-toggle="tab"><span class="fa fa-file-code-o"></span> {{ Lang::get('configFiles.label') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="hooks">
                        @include('projects._partials.commands')
                    </div>
                    <div class="tab-pane" id="variables">
                        @include('projects._partials.variables')
                    </div>
                    <div class="tab-pane" id="shared-files">
                        @include('projects._partials.shared_files')
                    </div>
                    <div class="tab-pane" id="config-files">
                        @include('projects._partials.config_files')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('projects.dialogs.server')
    @include('projects.dialogs.variable')
    @include('projects.dialogs.shared_files')
    @include('projects.dialogs.config_files')
@stop

@push('javascript')
    <script type="text/javascript">
        new app.SharedFilesTab();
        new app.ConfigFilesTab();
        new app.VariablesTab();

        app.SharedFiles.add({!! $sharedFiles->toJson() !!});
        app.ConfigFiles.add({!! $configFiles->toJson() !!});
        app.Variables.add({!! $variables->toJson() !!});

        app.project_id = {{ $project->id }};
    </script>
@endpush
