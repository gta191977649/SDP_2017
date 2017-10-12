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
                <div class="text-center">
                  <h2 class="text-center">Journals</h2>
                  <span class="text-muted text-center">Reading, Creating, Editing and Deleting a Journal.</span>
                </div>
                <hr>
            </div>
        </div>

        <!-- Created and Deleting Journals -->
        <div class="row">
          <div class="col-12">
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
            <div class="col-12 mt-3">
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
        </div>


        <!-- Notes Help Title -->
        <div class="row mt-4">
            <div class="col-12">
                <hr>
                <div class="text-center">
                  <h2 class="text-center">Entries</h2>
                  <span class="text-muted text-center">Requires a Journal to be made.</span>
                </div>

                <hr>
            </div>
        </div>


        <!-- Creating and Deleting Notes -->
        <div class="row">
            <!--<div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#openNote')" style="cursor: pointer;">How to Open an Entry</h4>
                        <div id="openNote" class="card-text">
                            <hr>
                            <p>While having the list of entries open, click on the name of the entry you wish to open.</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#createNote')" style="cursor: pointer;">How to Create an Entry</h4>
                        <div id="createNote" class="card-text">
                            <hr>
                            <p>Open the Journal you wish to add an entry to, click the 'NEW ENTRY +' button and you should be redirected to a create note page. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#deleteNote')" style="cursor: pointer;">How to Delete an Entry</h4>
                        <div id="deleteNote" class="card-text">
                            <hr>
                            <p>While having a Journal open, click 'Delete Entry' on the entry you wish to delete. The page should refresh and then the entry will be deleted.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#editNote')" style="cursor: pointer;">How to Edit an Entry</h4>
                        <div id="editNote" class="card-text">
                            <hr>
                            <p>While having a Journal open, click the 'Edit' button on the entry you wish to open, you'll be redirected to an edit entry window.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" onclick="showElement('#historyNote')" style="cursor: pointer;">How to view an Entry's history</h4>
                        <div id="historyNote" class="card-text">
                            <hr>
                            <p>While having a Journal open, click the 'History' button you should then be redirected to a entry history window.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
