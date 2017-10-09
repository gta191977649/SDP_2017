@extends('layouts/base')
@section('content')

    <div class = "container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Help and FAQ</h1>
            </div>
        </div>

        <!-- Journals Help Title -->
        <div class="row">
            <div class="col-12">
                <hr>
                <h2 class="text-center">Journals</h2>
                <hr>
            </div>
        </div>

        <!-- Created and Deleting Journals -->
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#createJournal')" style="cursor: pointer;">How to Create a Journal</h4>
                        <div id="createJournal" class="card-text">
                            <hr>
                            <p >After Logging-in, click '+New Journal' button and a dialog should pop up. With the dialog open enter a name on the supplied field and click 'Create Journal'. You should now have a new journal.</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#deleteJournal')" style="cursor: pointer;">How to Delete a Journal</h4>
                        <div id="deleteJournal" class="card-text">
                            <hr>
                            <p>After Logging-in, click the red Delete button on the journal you want to delete. The journal will be then sent to the trashed section along with any other journals you deleted.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#editJournal')" style="cursor: pointer;">How to Edit a Journal's Name</h4>
                        <div id="editJournal" class="card-text">
                            <hr>
                            <p>After Logging-in, click the Edit button next to the name of the journal you want to change the name of. A Dialog will pop-up allowing you to input the new name for the journal, if you change your mind simply click 'close'.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#openJournal')" style="cursor: pointer;">How to Open a Journal</h4>
                        <div id="openJournal" class="card-text">
                            <hr>
                            <p>After Logging-in, click on either the Image or Name of the journal you want to open, you should now see a screen displaying the notes within the journal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Notes Help Title -->
        <div class="row mt-4">
            <div class="col-12">
                <hr>
                <h2 class="text-center">Notes</h2>
                <hr>
            </div>
        </div>


        <!-- Creating and Deleting Notes -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#createNote')" style="cursor: pointer;">How to Create a Note</h4>
                        <div id="createNote" class="card-text">
                            <hr>
                            <p>placeholder - change me</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#deleteNote')" style="cursor: pointer;">How to Delete a Note</h4>
                        <div id="deleteNote" class="card-text">
                            <hr>
                            <p>placeholder - change me</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#editNote')" style="cursor: pointer;">How to Edit a Note</h4>
                        <div id="editNote" class="card-text">
                            <hr>
                            <p>placeholder - change me</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#openNote')" style="cursor: pointer;">How to Open a Note</h4>
                        <div id="openNote" class="card-text">
                            <hr>
                            <p>placeholder - change me</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
