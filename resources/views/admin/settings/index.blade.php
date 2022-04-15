@extends('metronics.layouts.master')

@section('content')
    <section id="setting-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Setting</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section-content">
                        <table class="table table-striped ">
                            <tbody>
                                <tr>
                                    <td colspan="2"><strong>Website Info</strong></td>
                                </tr>
                                <tr>
                                    <td>Website Title</td>
                                    <td>{{ $setting->title }}</td>
                                </tr>
                                <tr>
                                    <td>Meta Description</td>
                                    <td>{{ $setting->m_description }}</td>
                                </tr>
                                <tr>
                                    <td>Meta Keywords</td>
                                    <td>{{ $setting->m_keyword }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Contact</strong></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $setting->address }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $setting->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>{{ $setting->mobile }}</td>
                                </tr>
                                <tr>
                                    <td>Fax</td>
                                    <td>{{ $setting->fax }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $setting->email }}</td>
                                </tr>
                                <tr>
                                    <td>Notification Email</td>
                                    <td>{{ $setting->notification_email }}</td>
                                </tr>
                                <tr>
                                    <td>Working Time</td>
                                    <td>{{ $setting->working_time }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Social Links</strong></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td>
                                        <a href="{{ $setting->fb_link }}" target="_blank"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td>
                                        <a href="{{ $setting->insta_link }}" target="_blank"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>
                                        <a href="{{ $setting->twitter_link }}" target="_blank"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Youtube</td>
                                    <td>
                                        <a href="{{ $setting->youtube_link }}" target="_blank"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Whatsapp</td>
                                    <td>{{ $setting->whatsapp }}</td>
                                </tr>
                                <tr>
                                    <td>Viber</td>
                                    <td>{{ $setting->viber }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
