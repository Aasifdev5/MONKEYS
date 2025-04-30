@extends('master')

@section('content')
<style>
    .search-box {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .search-box input,
    .search-box button {
        height: 50px;
        font-size: 15px;
        border-radius: 30px;
    }
    .search-box label {
        font-weight: 500;
        margin-bottom: 5px;
    }
    .search-box .btn-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="search-box">
                <form id="searchForm">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label>Check-in</label>
                            <input type="time" name="check_in" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label>Check-out</label>
                            <input type="time" name="check_out" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label>Guests</label>
                            <input type="number" name="guests" class="form-control" min="1" placeholder="e.g. 2" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-dark w-100">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="roomResults" class="row g-4 mt-4"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        $.post("{{ route('rooms.search') }}", $(this).serialize(), function(data) {
            $('#roomResults').html(data);
        }).fail(function() {
            alert('Something went wrong. Please try again.');
        });
    });
</script>
@endpush
