    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("bower_components/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <!-- Modification according to design S -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('outlet.index') }}"><i class="fa fa-link"></i> <span>Home</span></a></li>
        <li class="active"><a href="{{ route('invoices.create') }}"><i class="fa fa-link"></i> <span>Sales</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Stock</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('factory.raw.index') }}">Raw Material Entry</a></li>
             <li> <a href="{{ route('factory.finished.index') }}">Finished Goods Entry</a></li>
            <li> <a href="{{ route('raw_material','pdf') }}">Raw PDF</a></li>
            <li> <a href="{{ route('factory.raw.challanList') }}">Challan List</a></li>
            <li> <a href="{{ route('raw_material','report') }}">Raw Report</a></li>
              <li> <a href="{{ route('factory.stock.index') }}"><i class="fa fa-link"></i><span>Stock in/out Entry</a></span></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Clients</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('clients.create') }}">New</a></li>
            <li> <a href="{{ route('clients.index') }}">Existing</a></li>
            <li> <a href="{{ route('clientsIndex') }}">Clients Report</a></li>
            <li><a href="{{ route('factory.supplier.create') }}"><i class="fa fa-link"></i> <span>Supplier Information</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Report</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           
            <li> <a href="{{ route('clientsIndex') }}">Clients Report</a></li>
            <li> <a href="{{ route('raw_material','report') }}">Raw Report</a></li>
            <li>  <a href="{{ route('finishedIndex') }}">Finished Good Report</a></li>


          </ul>
        </li>
        <li class="active"><a href="{{ route('petty.petty') }}"><i class="fa fa-link"></i> <span>Petty Cash</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Import</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
             <li> <a href="{{ route('factory.raw.challan') }}">Factory Entry</a></li>
            <li>  <a href="{{ route('factory.finished.challan') }}">Production Entry</a>
            <li> <a href="{{ route('factory.raw.challanList') }}">Search</a></li>
      
          </ul>
        </li>


        <!-- Modification according to design E -->





 <!--        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Raw</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('factory.raw.index') }}">Raw Material Entry</a></li>
            <li> <a href="{{ route('raw_material','pdf') }}">Raw PDF</a></li>
            <li> <a href="{{ route('factory.raw.challanList') }}">Challan List</a></li>
            <li> <a href="{{ route('raw_material','report') }}">Raw Report</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Finished Good</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('factory.finished.index') }}">Finished Goods Entry</a></li>
            <li>  <a href="{{ route('finishedIndex') }}">Finished Good Report</a></li>
            <li> <a href="{{ route('factory.finished.challanList') }}">Challan List</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Client</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>  <a href="{{ route('clients.index') }}">Clients List</a></li>
            <li>  <a href="{{ route('clients.create') }}">New Clients</a></li>
            <li>  <a href="{{ route('clientsIndex') }}">Clients Report</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Petty</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('petty.petty') }}">Petty View</a></li>
            <li> <a href="{{ route('petty.index') }}">Petty Input</a>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Challan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('factory.raw.challan') }}">Factory Challan</a></li>
            <li>  <a href="{{ route('factory.finished.challan') }}">Production Challan</a>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Outlet</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{ route('outlet.index') }}">Home</a></li>
          </ul>
        </li>
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li>  <a href="{{ route('invoices.create') }}"> <i class="fa fa-link"></i> <span>New Invoices</span></a></li>
         <li> <a href="{{ route('factory.supplier.create') }}"><i class="fa fa-link"></i> <span>Supplier Information</span></a></li>
         <li> <a href="{{ route('factory.stock.index') }}"><i class="fa fa-link"></i><span>Stock in/out Entry</a></span></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> 
      </ul>-->


      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>