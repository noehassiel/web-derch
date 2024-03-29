<div class="section">
    <div class="container is--members">
        <div class="members">
            <div class="w-dyn-list">
                <div role="list" class="w-dyn-items">
                    <!--foreach-->
                    @foreach ($campaings as $campaing)
                        <div role="listitem" class="w-dyn-item">
                            <a data-w-id="90b52bae-8399-31dc-33e4-968615b62e5b" href="{{ $campaing->link }}"
                                class="member-wrapper w-inline-block">
                                <div data-w-id="145af38a-5e35-0aee-12e9-d758947d89ba" class="member-stripe">
                                    <div class="name-parent">
                                        <div data-w-id="145af38a-5e35-0aee-12e9-d758947d89bc" class="name-container">
                                            <h4 class="member-name">{{ $campaing->name }}</h4>
                                            <h4 class="member-name">Ver más</h4>
                                        </div>
                                    </div>
                                    <div class="title-member">
                                        {{ $campaing->description }}
                                    </div>


                                </div>
                                <div data-w-id="611c5230-4ece-ed13-39b3-9f84251dd2b1" class="member-image">
                                    <img src="{{ asset('front/images/campaings/' . $campaing->image) }}" loading="lazy"
                                        alt="" class="member-img">
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <!--foreach-->
                </div>
            </div>
        </div>
    </div>
</div>
