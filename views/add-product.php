<div class="container mt-3 px-5">
    <div class="row align-items-center">
        <!-- header text -->
        <div class="col">
            <h1 class="ms-2">Product Add</h1>
        </div>
        <!-- buttons -->
        <div class="col">
            <!-- CANCEL BUTTON -->
            <button onclick=" window.location.href = '/' " class="btn btn-light  float-end me-2">Cancel</button>
            <!-- Save button -->
            <button type="submit" form="product_form" class="btn btn-primary float-end me-2">Save</button>

        </div>
    </div>
    <hr>
</div>

<div class="container mt-3 px-5">
    <!-- product form -->
    <form id="product_form" method="POST" action="store" onsubmit="return validate()">
        <!-- SKU -->
        <div class="row mb-3">
            <!-- SKU label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">SKU</label>
            <!-- SKU input -->
            <div class="col-sm-3">
                <input id="sku" type="text" required="true" class="form-control" name="sku" oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')">
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id="validationSkuAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="row mb-3">
            <!-- Name label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">Name</label>
            <!-- Name input -->
            <div class="col-sm-3">
                <input id="name" type="text" required="true" class="form-control" name="name" oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')">
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id="validationNameAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!-- Price -->
        <div class="row mb-3">
            <!-- Price label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">Price ($)</label>
            <!-- Price input -->
            <div class="col-sm-2">
                <input id="price" type="number" step="0.001" required="true" class="form-control" name="price" oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')">
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id="validationPriceAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!---------------------------------------------------------------------------------->
        <!-- SWITCHER AND SPECIAL ATTRIBUTES THAT DEPENDS ON THE DROPDOWN OPTION SELECTED -->
        <!---------------------------------------------------------------------------------->

        <!-- Type Switcher-->
        <div class="row mb-3 align-items-center">
            <!-- Type Switcher label -->
            <label class="col-sm-1 col-form-label me-5 ms-2 ">Type Switcher</label>
            <div class="col-sm-3">
                <select id="productType" onchange="showElement()" required="true" name="typeSwitcher" class="form-select form-select-sm" oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')">
                    <!--Options to choose from ;) -->
                    <option disabled selected value="">Type Switcher</option>
                    <option id="DVD" value="DVD">DVD</option>
                    <option id="Book" value="Book">Book</option>
                    <option id="Furniture" value="Furniture">Furniture</option>
                </select>
            </div>
        </div>

        <!-- Special Attrs views -->
        <?php require_once view_path() . '/partials/attributes.php'; ?>

    </form>
</div>

<script src="../js/validation.js"></script>
<script src="../js/special_attr_handler.js"></script>