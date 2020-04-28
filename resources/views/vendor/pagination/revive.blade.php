@php /** @var Illuminate\Pagination\LengthAwarePaginator $paginator*/ @endphp
@if($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <span class="ti-arrow-left"></span>
                                  </span>
                        </a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                                          <span aria-hidden="true">
                                              <span class="ti-arrow-right"></span>
                                          </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endif
