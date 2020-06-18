<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>{{__('Url Shortener')}}</strong> {{__('by')}} <a href="https://github.com/on3n3o">Marcin Maciejewski</a>.
            {{__('The source code is licensed')}} <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
            {{__('The website content is licensed')}} <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.<br>
            {{__('Code created with')}} <i class="fa fa-heart has-text-danger"></i> {{__('in')}} <a href="https://github.com/on3n3o/url-shortener">https://github.com/on3n3o/url-shortener</a>
            @if(isset($time_elapsed))
            <p class="has-text-grey-lighter">Time elapsed on DB({{ $time_elapsed ?? '' }} s) on node {{ ($dockerId = exec('cat /proc/1/cpuset | cut -c9-')) != '' ? $dockerId : 'not_dockerized' }}</p>
            @endif
        </p>
    </div>
</footer>