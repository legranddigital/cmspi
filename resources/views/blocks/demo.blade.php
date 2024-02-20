{{--
  Title: Demo
  Description: Introduciton Text
  Category: layout
  Icon: editor-alignleft
  Keywords: intro introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}
<div style="background: #ececec;padding: 50px">
<a class="btn--primary large">Button</a>
<a class="btn--primary medium">Button</a>
<a class="btn--primary small">Button</a>
<a class="btn--primary-light large">Button</a>
<a class="btn--primary-light medium">Button</a>
<a class="btn--primary-light small">Button</a>
<a class="btn--secondary large">Button</a>
<a class="btn--secondary medium">Button</a>
<a class="btn--secondary small">Button</a>
<a class="btn--secondary-light large">Button</a>
<a class="btn--secondary-light medium">Button</a>
<a class="btn--secondary-light small">Button</a>
</div>
<div class="row">
    <div class="col-xs-1">
        <div class="box">
            1
        </div>
    </div>
    <div class="col-xs-1">
        <div class="box">
            2
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            3
        </div>
    </div>
    <div class="col-xs-1">
        <div class="box">
            4
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            5
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            6
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            7
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            8
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            9
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            10
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            11
        </div>
    </div>
    <div class="col-xs-1 ">
        <div class="box">
            12
        </div>
    </div>
</div>

<section class="demo">
    <div class="row">
        <div class="col-6">
        @hasfield('heading')
            <h1>
                @field('heading')
            </h1>
        @endfield
        </div>
        <div class="col-6">
            @hasfield('text')
                @field('text')            
            @endfield
        </div>
    </div>
</section>

