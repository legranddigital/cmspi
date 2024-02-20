{{--
  Title: Contact Form
  Description: Contact Form
  Category: layout
  Icon: editor-alignleft
  Keywords: Contact Form text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@hasfield('contactform_submit_link')

<section class="contactformSection" @hasfield('scroll_id') id="@field('scroll_id')
" @endfield>
<div class="section-inner">

    <div class="row">
        <div class="col-xs-12 col-lg-6 pr-0">
            <div class="form-container">
                <form action="@field('contactform_submit_link')" method="get">

                    <div class="form-group">
                        <input type="text" name="name" placeholder="@hasfield('name_field_placeholder') @field('name_field_placeholder') @endfield">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" placeholder="@hasfield('email_field_placeholder') @field('email_field_placeholder') @endfield">
                        <label for="email"></label>
                    </div>

                    <div class="form-group">
                        <input type="text" name="company" placeholder="@hasfield('company_field_placeholder') @field('company_field_placeholder') @endfield">
                    </div>

                    <div class="form-group">
                        <input type="text" name="telephone" placeholder="@hasfield('phone_field_placeholder') @field('phone_field_placeholder') @endfield">
                    </div>

                    <div class="form-group">
                        <select name="subject" id="pet-select">
                            <option value="intro">@hasfield('choose_subject_placeholder') @field('choose_subject_placeholder') @endfield</option>
                            @hasfield('subjects')
                            @fields('subjects')
                                <option value="@sub('subject')">@sub('subject')</option>
                            @endfields
                            @endfield
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="message" placeholder="@hasfield('message_placeholder') @field('message_placeholder') @endfield">
                    </div>

                    <input type="submit" class="btn--primary medium basic form" value="@field('cta_copy')" />

                </form>
            </div>
        
        </div>
        <div class="col-xs-12 col-lg-6 pl-0">
            <img class="contactImg" src="@field('image')" alt="">
        </div>
    </div>


</div>
</section>
@endfield 
