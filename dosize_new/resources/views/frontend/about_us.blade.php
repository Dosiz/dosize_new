@extends('frontend_layout.frontend')
@section('title')
OFF SEASON GM
@endsection
@push('styles')

@endpush
@section('content')
<!-- main -->
<main class="about_main">
    <!-- section about -->
    <div class="about_section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text_content">
                        <h2 class="section_title font_impact">ABOUT</h2>
                        <p class="section_para">
                            This is the ultimate site designed specifically for commissioners & owners that play in
                            highly active fantasy leagues! From the start of the offseason, up until draft day, we
                            got you covered! THE OFFSEASON GM helps keeper leagues organize & enhance the off season
                            action for both commissioners, and team owners by creating an interactive draft board
                            and league experience!
                        </p>
                        <p class="section_para">
                            Fantasy commissioners are always on the clock, and we are here to unlock and fill in the
                            gap of what other major platforms are missing for better off season preparation!
                        </p>
                        <p class="section_para">
                            Year after year -As the commish, and member of serious and competitive leagues, I have
                            begrudgingly managed and tracked multiple spreadsheets of traded draft picks and
                            keepers, through multiple sports, group chats, leagues & platforms. Keeper leagues that
                            have unique and customized keeper rules and involvement. This has become a manually
                            intensive process, riddled with human error that can cause serious live offline draft
                            day issues! This platform will provide higher league participation, functionality, and
                            organization by making you the best commish and GM in all of fantasy!
                        </p>
                        <span class="text_green fw-bold">NOW GO WIN THE SEASON -- IN THE OFF SEASON!</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img_content">
                        <img src="{{asset('assets/img/moniter.png') }}" alt="moniter" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section features -->
    <div class="about_section_2 features_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img_content">
                        <img src="{{asset('assets/img/moniter.png') }}" alt="moniter" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text_content">
                        <h2 class="section_title font_impact">Features</h2>
                        <div class="features_list">
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Enables commissioners who are in highly active year
                                    round leagues, to immerse themselves in an fully interactive & customizable
                                    draft board</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Version control that allows you to always see the most
                                    up to date draft board</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Fully integrated platform that allows commissioners to
                                    invite other owners, kickoff and manage off season transactions and activities
                                    up to draft day!</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Live Draft Mode & Edit Mode that allows the commish to
                                    go live or get back in the lab!
                                </p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Multiple draft boards, for multiple leagues, no matter
                                    the platform</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Designate Keepers and keeper Values</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Fills off season gaps that active leagues require during
                                    the year, from Draft Lottery Simulation to Live Draft</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Specifically designed for active keeper leagues where
                                    transactions and management is required by the commish</p>
                            </div>
                            <div class="list d-flex">
                                <i class="fa-solid fa-right-long right_arrow"></i>
                                <p class="section_para m-0">Create a one stop shop for off season business</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- main-end --}}
@endsection

@section('script')
@endsection
            