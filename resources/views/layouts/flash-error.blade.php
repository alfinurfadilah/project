<div class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
  <!--begin::Icon-->
  <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen045.svg-->
  <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
      <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
      <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
      <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="black"/>
    </svg>
  </span>
  <!--end::Svg Icon-->
  <!--end::Icon-->

  <!--begin::Content-->
  <div class="d-flex flex-column pe-0 pe-sm-10">
    <h5 class="mb-1">Terjadi kesalahan</h5>
    <span>{{$message}}</span>
  </div>
  <!--end::Content-->
  <!--begin::Close-->
  <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
    <i class="bi bi-x fs-1 text-danger"></i>
  </button>
  <!--end::Close-->
</div>