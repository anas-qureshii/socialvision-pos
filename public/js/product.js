const productType = document.getElementById("productType");

if (productType) {
    productType.addEventListener("change", (e) => {
        const atCon = document.getElementById("attr-container");
        if (atCon) {
            console.log(atCon);
            const confirmation = confirm(
                "By switching options, you may lose data. Continue?"
            );
            if (confirmation) {
                atCon.remove();
                attributes_data = [];
                return;
            }
        }

        const val = parseInt(e.target.value);
        if (val <= 0) return;

        const mainContainer = document.getElementById("main-var-data");
        mainContainer.classList.remove("hidden");

        const addAttr = document.getElementById("add_attrs");
        let attributes_data = [];

        addAttr.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();

            const varDataP = document.getElementById("attribute-data");
            if (document.getElementById("attr-container")) {
                alert("attribute div is already added");
                return;
            }

            const attrDiv = document.createElement("div");
            attrDiv.setAttribute(
                "class",
                "bg-gray-50 border border-gray-200 p-4 rounded-lg my-4"
            );
            attrDiv.setAttribute("id", "attr-container");
            attrDiv.innerHTML = `
                <h3 class="text-lg font-semibold mb-3 themeFont">Product Attributes</h3>
                <div class="flex flex-wrap gap-4 mt-4 main-attr-div">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm mb-1 themeFont">Attribute Name</label>
                        <input type="text" placeholder="e.g., Size" id="attr-name"
                            class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm mb-1 themeFont">Attribute Values</label>
                        <input type="text" placeholder="e.g., S, M, L" id="attr-vals"
                            class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                    </div>
                </div>
                <button type="button"
                    class="bg-[#1447e6] text-white mt-3 p-2 px-3 flex rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                    id="add_attr">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add
                </button>`;
            varDataP.append(attrDiv);

            const attrTitle = document.getElementById("attr-name");
            const attrValues = document.getElementById("attr-vals");
            const addAttribute = document.getElementById("add_attr");

            const preventEnter = (e) => {
                if (e.key === "Enter") e.preventDefault();
            };

            [attrTitle, attrValues].forEach((el) =>
                el.addEventListener("keydown", preventEnter)
            );

            addAttribute.addEventListener("click", () => {
                const attrTVal = attrTitle.value.trim();
                const attrVVal = attrValues.value.trim();
                const regx = /^[a-zA-Z0-9, ]*$/;

                if (!attrTVal || !attrVVal) {
                    alert(
                        "It is important to enter Attribute Name And Attribute Value before adding"
                    );
                    return;
                }

                if (!regx.test(attrTVal) || !regx.test(attrVVal)) {
                    alert(
                        "Special characters are not allowed in attribute names or values"
                    );
                    return;
                }

                const attrOpts = attrVVal
                    .split(",")
                    .map((v) => v.trim())
                    .filter(Boolean);
                const keys = attributes_data.map((obj) => Object.keys(obj)[0]);

                if (keys.includes(attrTVal)) {
                    alert(`The attribute ${attrTVal} is already present`);
                    return;
                }

                attributes_data.push({ [attrTVal]: attrOpts });
                let makeVariationBtnHtml = `<button 
                        class="bg-[#1447e6] text-white p-3 px-4 rounded-md themeFont text-lg hover:bg-blue-600
                         ease-linear duration-200 cursor-pointer" id="make-Variations" type="button">
                            Make Variations
                        </button>`;

                // Create attributes container if not exists
                if (!document.getElementById("attributes-container")) {
                    const attrDataWrapper = document.createElement("div");
                    attrDataWrapper.setAttribute(
                        "class",
                        "w-full flex flex-col items-start gap-4 pt-4"
                    );
                    attrDataWrapper.setAttribute("id", "attr-data");
                    attrDataWrapper.innerHTML = `
                        <div class="w-full flex flex-col gap-4" id="attributes-container"></div>
                        ${val > 1 ? makeVariationBtnHtml : ""}
                       `;

                    document
                        .getElementById("attr-container")
                        .append(attrDataWrapper);
                }

                // Re-render the attribute rows
                function RenderAttributesRows() {
                    console.log(attributes_data);
                    const container = document.getElementById(
                        "attributes-container"
                    );
                    container.innerHTML = "";
                    console.log(attributes_data);
                    attributes_data.forEach((element, indx) => {
                        const key = Object.keys(element)[0];
                        const attrValuesHTML = element[key]
                            .map(
                                (val, num) => `
                        <span class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                            ${val}
                            <button class="ml-2 text-white hover:text-red-200 transition duration-200 attr-opts" type="button" btn-row-index="${indx}" btn-index="${num}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </span>`
                            )
                            .join("");

                        const attrElement = document.createElement("div");
                        attrElement.setAttribute(
                            "class",
                            "w-full flex flex-col sm:flex-row border border-gray-200 rounded-md overflow-hidden attribute-row"
                        );
                        attrElement.innerHTML = `
                        <div class="w-full sm:w-1/3 bg-blue-700 p-4 flex items-center justify-between">
                            <h3 class="text-lg font-semibold themeFont text-white">${key}</h3>
                            <button class="remove-attr text-white hover:text-red-200 transition duration-200" type="button" del-row="${indx}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="w-full sm:w-2/3 p-4 flex flex-wrap gap-2 items-center">
                            ${attrValuesHTML}
                        </div>`;
                        container.append(attrElement);
                    });
                    let AttrInp = document.getElementById("attribute_data_inp");
                    AttrInp.value = `${JSON.stringify(attributes_data)}`;
                    console.log(AttrInp.value);
                }
                RenderAttributesRows();
                // Clear inputs
                attrTitle.value = "";
                attrValues.value = "";

                // removing rows and option from attributes
                document
                    .getElementById("attributes-container")
                    .addEventListener("click", function (e) {
                        const removeBtn = e.target.closest(".remove-attr");

                        if (removeBtn) {
                            e.preventDefault();
                            e.stopImmediatePropagation();

                            const idx = parseInt(
                                removeBtn.getAttribute("del-row"),
                                10
                            );

                            if (!isNaN(idx) && attributes_data[idx]) {
                                attributes_data.splice(idx, 1);
                                RenderAttributesRows();
                            }
                        }

                        const removeOptBtn = e.target.closest(".attr-opts");

                        if (removeOptBtn) {
                            e.preventDefault();
                            e.stopImmediatePropagation();

                            const rowIdx = parseInt(
                                removeOptBtn.getAttribute("btn-row-index"),
                                10
                            );
                            const optIndx = parseInt(
                                removeOptBtn.getAttribute("btn-index"),
                                10
                            );

                            if (
                                !isNaN(rowIdx) &&
                                attributes_data[rowIdx] &&
                                !isNaN(optIndx)
                            ) {
                                let optVal = Object.values(
                                    attributes_data[rowIdx]
                                )[0];
                                if (optVal[optIndx]) {
                                    optVal.splice(optIndx, 1);
                                    if (optVal.length == 0) {
                                        attributes_data.splice(rowIdx, 1);
                                    }
                                    RenderAttributesRows();
                                }
                            } else {
                                console.log("option is not present");
                            }
                        }
                    }); // here closes

                // removing rows and option from attributes ends here =======

                if (val > 1) {
                    let MakeVariation =
                        document.getElementById("make-Variations");
                    if (MakeVariation) {
                        MakeVariation.addEventListener("click", (e) => {
                            e.preventDefault();
                            e.stopImmediatePropagation();
                            let VariationContainer = document.getElementById(
                                "variation_container"
                            );
                            if (!VariationContainer) {
                                let div = document.createElement("div");
                                div.setAttribute(
                                    "class",
                                    "w-full flex flex-col gap-6 pt-4"
                                );
                                div.setAttribute("id", "variation_container");
                                document
                                    .getElementById("attr-container")
                                    .append(div);
                                VariationContainer = document.getElementById(
                                    "variation_container"
                                );
                            }
                            function generateVariationStrings(attributes) {
                                const entries = attributes.map((attr) => {
                                    const key = Object.keys(attr)[0]; // e.g., "size"
                                    const values = attr[key]; // e.g., ["small", "medium", "large"]
                                    return values.map((value) => ({
                                        [key]: value,
                                    })); // → [{ size: "small" }, { size: "medium" }, ...]
                                });

                                const combos = cartesianProduct(entries); // All possible combinations

                                return combos.map((combination) => {
                                    const merged = Object.assign(
                                        {},
                                        ...combination
                                    ); // Merge: [{ size: "small" }, { color: "red" }] → { size: "small", color: "red" }
                                    return Object.values(merged).join("-"); // Convert to string: "small-red"
                                });
                            }

                            function cartesianProduct(arr) {
                                return arr.reduce(
                                    (a, b) =>
                                        a.flatMap((d) =>
                                            b.map((e) => [...d, e])
                                        ),
                                    [[]]
                                );
                            }
                            let combination =
                                generateVariationStrings(attributes_data);
                            console.log(VariationContainer);
                            console.log(combination);
                            combination.forEach((elem, idx) => {
                                let div = document.createElement("div");
                                div.setAttribute(
                                    "class",
                                    "w-full flex flex-col border border-gray-200 rounded-md overflow-hidden variation-box"
                                );
                                div.innerHTML = `
                                 <div class="w-full bg-blue-700 p-4 flex items-center justify-between var-header" data-box='variation-box-${idx}' >
                                    <h3 class="text-lg font-semibold themeFont text-white capitalize">${elem}</h3>
                                    <button class="text-white hover:text-red-200 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Pricing and Stock Form -->
                                <div class="w-full bg-gray-50 p-6 var-body transition-all duration-300 ease-in hidden" id='variation-box-${idx}'>
                                    <!-- First Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per feet Price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="text" placeholder="Enter price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-md numberInp themeFont focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per Roll price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="text" placeholder="Enter price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Second Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Retail Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="text" placeholder="Enter wholesale price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Wholesale Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="text" placeholder="Enter wholesale price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Stock Quantity Row -->
                                    <div class="w-full">
                                        <label class="flex text-sm font-medium text-gray-700 mb-1">
                                            Stock (Quantity):
                                            <span class="text-red-500 ml-1">*</span>
                                        </label>
                                        <input type="text" placeholder="Enter available quantity for this variation"
                                            class="w-full px-4 py-3 mt-2 themeFont border border-gray-300 rounded-md numberInp focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                `;
                                VariationContainer.append(div);
                            });
                            let varHead =
                                document.getElementsByClassName("var-header");
                            Array.from(varHead).forEach((item) => {
                                item.addEventListener("click", function (e) {
                                    e.preventDefault();
                                    e.stopImmediatePropagation();

                                    let parent = this.closest(".variation-box");
                                    varBody = parent.querySelector(".var-body");
                                    varBody.classList.toggle("hidden");
                                });
                            });
                            let NumberInp = Array.from(
                                document.getElementsByClassName("numberInp")
                            );
                            NumberInp.forEach((itm) => {
                                itm.addEventListener("input", (e) => {
                                    // Replace any non-digit characters with an empty string
                                    e.target.value = e.target.value.replace(
                                        /\D/g,
                                        ""
                                    );
                                });
                            });
                        });
                    }
                }
            });
        });
    });
}
