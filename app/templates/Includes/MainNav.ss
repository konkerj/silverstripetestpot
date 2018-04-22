<div id="nav-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="$AbsoluteBaseUrl" class="nav-logo"><img src="images/logo.png" alt="One Ring Rentals" /></a>

                <!-- BEGIN MAIN MENU -->
                <nav class="navbar">
                    <button id="nav-mobile-btn"><i class="fa fa-bars"></i></button>

                    <ul class="nav navbar-nav">
                        <% loop $Menu(1) %>
                        <li><a href="$Link" title="Go to $Title" class="$LinkingMode">$MenuTitle</a></li>
                        <% end_loop %>
                    </ul>

                </nav>
                <!-- END MAIN MENU -->

            </div>
        </div>
    </div>
</div>
