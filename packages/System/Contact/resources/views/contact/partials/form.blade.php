<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
                {{-- Name input field--}}
                {!! FormHelper::text('Họ tên', 'name', null, ['input' => ['required']]) !!}

                {{-- Email input field--}}
                {!! FormHelper::email('Email', 'email', null, ['input' => ['required']]) !!}

                {{-- Mobile input fiel --}}
                {!! FormHelper::text('SĐT', 'phone', null, ['input' => ['required']]) !!}

                {!! FormHelper::textarea('Nội dung', 'message') !!}
        </div>
    </div>
</div>
