@extends('master')

@section('title')
    {{ __('Registro de Cliente') }}
@endsection

@section('content')
 <div class="page_content_wrap" style="
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      ">
  <div class="content_wrap">
    <div class="content">
      <article id="post-193" data-post-id="193" class="post_item_single post_type_page post-193 page type-page status-publish hentry">
        <div class="post_content entry-content">
          <div data-elementor-type="wp-post" data-elementor-id="193" class="elementor elementor-193">

           
            <section class="elementor-section elementor-top-section elementor-element elementor-element-71de823 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="71de823" data-element_type="section">
              <div class="elementor-container elementor-column-gap-extended">
                <div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-b3a283d sc_inner_width_none sc_layouts_column_icons_position_left" data-id="b3a283d" data-element_type="column">
                  <div class="elementor-widget-wrap"></div>
                </div>
                <br>
                <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-f5eb51c sc_inner_width_none sc_layouts_column_icons_position_left" data-id="f5eb51c" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-b04bbeb sc_fly_static elementor-widget elementor-widget-trx_sc_title" data-id="b04bbeb" data-element_type="widget" data-widget_type="trx_sc_title.default">
                      <div class="elementor-widget-container">
                        <div id="trx_sc_title_1704079400" class="sc_title sc_title_decoration">
                            <br>
                          <h2 class="sc_item_title sc_title_title sc_align_center sc_item_title_style_decoration">
                            <span class="sc_item_title_text">{{ __('Registro de Cliente') }}</span>
                          </h2>
                        </div>
                        <!-- /.sc_title -->
                      </div>
                    </div>
                    <div class="elementor-element elementor-element-4c81209 sc_fly_static elementor-widget elementor-widget-spacer" data-id="4c81209" data-element_type="widget" data-widget_type="spacer.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-spacer">
                          <div class="elementor-spacer-inner"></div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="elementor-element elementor-element-9128142 sc_fly_static elementor-widget elementor-widget-shortcode" data-id="9128142" data-element_type="widget" data-widget_type="shortcode.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-shortcode">
                          <div class="wpcf7 js alert_inited" id="wpcf7-f6-p193-o1" lang="en-US" dir="ltr" data-wpcf7-id="6">
                            <div class="screen-reader-response">
                              <p role="status" aria-live="polite" aria-atomic="true"></p>
                              <ul></ul>
                            </div>
                            <form action="{{ url('reg') }}" method="POST" id="contact_form" class="wpcf7-form init" aria-label="Formulario de contacto" novalidate="novalidate" data-status="init" data-inited-keypress="1"> @csrf @if (Session::has('flash_message')) <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                              </div> @endif @if (Session::has('error_flash_message')) <div class="alert alert-danger">
                                {{ Session::get('error_flash_message') }}
                              </div> @endif 
                              <div class="elementor-column-gap-extended">
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required @error('first_name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Tu Nombre"  type="text" value="{{ old('first_name') }}" name="first_name">
                                      </span>
                                        @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required @error('last_name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Tu Apellido"  type="text" value="{{ old('last_name') }}" name="last_name">
                                      </span>
                                        @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                  </div>
                                  <div class="elementor-row">
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required @error('code') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Tu Código"  type="text" value="{{ old('code') }}" name="code">
                                      </span>
                                        @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-email">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email  @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}"  type="email" name="email">
                                      </span>
                                        @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required @error('password') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Contraseña"  type="password" value="{{ old('password') }}" name="password">
                                      </span>
                                       @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-email">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email @error('confirm_password') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Repetir Contraseña"  type="password" name="confirm_password" value="{{ old('confirm_password') }}">
                                      </span>
                                       @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-100">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required @error('mobile_number') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Número de WhatsApp"  type="text" name="mobile_number" value="{{ old('mobile_number') }}">
                                      </span>
                                       @error('mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              
                              
                              <div class="text">
                                <input class="wpcf7-form-control wpcf7-submit has-spinner sc_button_hover_slide_left" type="submit" value="Registrar">
                                <span class="wpcf7-spinner"></span>
                              </div>
                              <br>
                              <div class="elementor-widget-container mt-3 text-center">
                                <span class="text-dark">{{ __('¿Ya tienes una cuenta?') }} </span>
                                <a href="{{ url('login') }}" class="text-primary font-weight-bold">{{ __('Inicia sesión aquí') }}</a>
                            </div>
                            <br>
                              <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-9e9283b sc_inner_width_none sc_layouts_column_icons_position_left" data-id="9e9283b" data-element_type="column">
                  <div class="elementor-widget-wrap"></div>
                </div>
              </div>
            </section>
            
          </div>
        </div>
        <!-- .entry-content -->
      </article>
    </div>
    <!-- </.content> -->
  </div>

  <!-- </.content_wrap> -->
</div>

@endsection
