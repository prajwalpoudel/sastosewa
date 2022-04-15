<div class="kt-portlet__body">
    <section class="website_info">
        <div class="mb-3 font-weight-normal row">
            <div class="col-md-12">
                <h6 for="">Website Info</h6>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('title', 'Website Title :') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                @error('title')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('m_description', 'Meta Description :') !!}
                {!! Form::textarea('m_description', null, ['class' => 'form-control', 'rows' => 3, 'style' => 'resize:none']) !!}

                @error('m_description')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('m_keyword', 'Meta Keywords :') !!}
                {!! Form::textarea('m_keyword', null, ['class' => 'form-control', 'rows' => 3, 'style' => 'resize:none']) !!}

                @error('m_keyword')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </section>

    <section class="address">
        <div class="mb-3 font-weight-normal row">
            <div class="col-md-12">
                <h6 for="">Contact</h6>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('address', 'Address :') !!}
                {!! Form::text('address', null, ['class' => 'form-control']) !!}

                @error('address')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-6">
                {!! Form::label('phone', 'Phone :') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                @error('phone')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('mobile', 'Mobile :') !!}
                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}

                @error('mobile')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-6">
                {!! Form::label('fax', 'Fax :') !!}
                {!! Form::text('fax', null, ['class' => 'form-control']) !!}

                @error('fax')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('email', 'Email :') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}

                @error('email')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                {!! Form::label('notification_email', 'Notification Email :') !!}
                {!! Form::text('notification_email', null, ['class' => 'form-control']) !!}

                @error('notification_email')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('working_time', 'Working Time :') !!}
                {!! Form::text('working_time', null, ['class' => 'form-control']) !!}

                @error('working_time')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </section>

    <section class="social-links">
        <div class="mb-3 font-weight-normal row">
            <div class="col-md-12">
                <h6 for="">Social Links</h6>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('fb_link', 'Facebook :') !!}
                {!! Form::text('fb_link', null, ['class' => 'form-control']) !!}

                @error('fb_link')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                {!! Form::label('insta_link', 'Instagram :') !!}
                {!! Form::text('insta_link', null, ['class' => 'form-control']) !!}

                @error('insta_link')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('twitter_link', 'Twitter :') !!}
                {!! Form::text('twitter_link', null, ['class' => 'form-control']) !!}

                @error('twitter_link')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                {!! Form::label('youtube_link', 'Youtube :') !!}
                {!! Form::text('youtube_link', null, ['class' => 'form-control']) !!}

                @error('youtube_link')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('whatsapp', 'Whatsapp :') !!}
                {!! Form::text('whatsapp', null, ['class' => 'form-control']) !!}

                @error('whatsapp')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-6">
                {!! Form::label('viber', 'Viber :') !!}
                {!! Form::text('viber', null, ['class' => 'form-control']) !!}

                @error('viber')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </section>


</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit"
                        class="btn btn-primary"
                        title="{{ $formAction }}"
                >
                    {{ $formAction }}
                </button>
                <a href="{{ route('admin.setting.index') }}"
                   type="reset"
                   class="btn btn-secondary"
                   title="Cancel"
                >
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>
