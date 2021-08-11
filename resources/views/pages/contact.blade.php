@extends('welcome')
@section('content')
<div class="page-index">
          <div class="container">
            <p>
              Home - Contact us
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h5 class="title contact-title">
                Contact Us
              </h5>
              <div class="clearfix">
              </div>
              <div class="map">
                <iframe width="600" height="350" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Vietnam&amp;aq=&amp;sll=14.058324,108.277199&amp;sspn=21.827722,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=Vietnam&amp;ll=14.058324,108.277199&amp;spn=8.883583,21.643066&amp;t=m&amp;z=6&amp;output=embed">
                </iframe>
              </div>
              <div class="clearfix">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="contact-infoormation">
                    <h5>
                      Thông tin liên hệ
                    </h5>
                    <p>
                      
                    </p>
                    <ul>
                      <li>
                        <p>
                          Địa chỉ email : tmqzuang24@gmail.com
                        </p>
                      </li>
                      <li>
                        <p>
                          0867 543 248
                        </p>
                      </li>
                      <li>
                        <p>
                          Số 1 
                          <br>
                          Hanoi, Vietnam
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="ContactForm">
                    <h5>
                      Contact Form
                    </h5>
                    <form action="{{ route('putcontact') }}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <label>
                            Your Name 
                            <strong class="red">
                              *
                            </strong>
                          </label>
                          <input class="inputfild" type="text" name="name">
                        </div>
                        <div class="col-md-6">
                          <label>
                            Your Email
                            <strong class="red">
                              *
                            </strong>
                          </label>
                          <input class="inputfild" type="email" name="email">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>
                            Your phone 
                            <strong class="red">
                              *
                            </strong>
                          </label>
                          <input class="inputfild" type="text" name="phone">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label>
                            Your Message 
                            <strong class="red">
                              *
                            </strong>
                          </label>
                          <textarea class="inputfild" rows="8" name="message">
                          </textarea>
                        </div>
                      </div>
                      <button class="pull-right" type="submit" name="submit">
                        Send Message
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
        </div>
      </div>
      @endsection()