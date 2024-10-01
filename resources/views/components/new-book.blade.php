<div class="modal fade" id="newBook" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="bookForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title_hu" class="form-label">Cím (magyar)</label>
                        <input type="text" class="form-control" id="title_hu" />
                    </div>
                    <div class="mb-3">
                        <label for="title_en" class="form-label">Cím (angol)</label>
                        <input type="text" class="form-control" id="title_en" />
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Szerző(k) - több esetén vesszővel elválasztva</label>
                        <input type="text" class="form-control" id="author" />
                    </div>
                    <div class="mb-3">
                        <label for="publication_year" class="form-label">Kiadási év</label>
                        <input type="text" class="form-control" id="publication_year" />
                    </div>
                    <div class="mb-3">
                        <label for="description_hu" class="form-label">Leírás (magyar)</label>
                        <textarea class="form-control" id="description_hu"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description_en" class="form-label">Leírás (angol)</label>
                        <textarea class="form-control" id="description_en"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Borítókép</label>
                        <input type="file" class="form-control" id="cover_image" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kulcsszavak</label>
                        <div id="keywords">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="Kulcsszó (magyar)">
                                <input type="text" class="form-control" placeholder="Kulcsszó (angol)">
                                <button class="btn btn-outline-danger" type="button">Törlés</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary" onclick="addInput('Kulcsszó')">+</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategóriák</label>
                        <div id="genres">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="Kategória (magyar)">
                                <input type="text" class="form-control" placeholder="Kategória (angol)">
                                <button class="btn btn-outline-danger" type="button">Törlés</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary" onclick="addInput('Kategória')">+</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                <button type="button" class="btn btn-primary" id="createButton">Hozzáadás</button>
            </div>
        </div>
    </div>
</div>
