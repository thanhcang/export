@servers(['localhost' => '127.0.0.1'])

@story('deploy')

@endstory

@task('git')
    git pull origin master
@endtask

@task('clean')

@endtask

@taks('composer')

@endtask
