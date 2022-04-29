<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ajax</title>

        <!-- CDN CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-6 py-5">
                    <nav class="navbar navbar-light bg-light px-2 mb-5">
                        <div class="col">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Member</button>

                            <!-- Add Member Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    @csrf
                                        <input type="text" name="add_member" id="add_member" placeholder="Add a new member here..." class="form-control">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success btn-sm " data-bs-dismiss="modal" id="add_member_btn">Add Member</button>
                                </div>
                                </div>
                            </div>
                            </div><!-- End Add Member Modal -->
                        </div>
                        <div class="col">
                            <form class="d-flex align-self-end" id="search_member">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>

                    <div class="alert alert-secondary" role="alert" id="alert"></div>

                    <ul class="list-group" id="members_list">
                        @foreach($members as $member)
                            <li class="list-group-item member" data-bs-toggle="modal" data-bs-target="#editMember">
                                <span id="member_name">{{ $member->name }}</span>
                                <input type="hidden" id="member_id" value="{{ $member->id }}">
                            </li>
                        @endforeach
                    </ul>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMemberLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editMemberLabel">Edit Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" id="edit_member_name" class="form-control">
                                <input type="hidden" id="edit_member_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" id="del_member_btn">Delete Member</button>
                                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" id="edit_member_btn">Edit Member</button>
                            </div>
                            </div>
                        </div>
                    </div><!-- End Modal -->
                </div>
            </div>
        </div>
        <!-- CDN JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>
