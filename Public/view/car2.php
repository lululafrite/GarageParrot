<?php
    include('../controller/car.controller.php');
?>

<section class="m-5 d-flex flex-wrap justify-content-around" id="carSection">
</section>

<script>
    // Créer un élément <form>
    const form = document.createElement("form");
    form.action = "";
    form.method = "post";

    // Créer la div principale avec les classes appropriées
    const mainDiv = document.createElement("div");
    mainDiv.className = "d-sm-flex justify-content-sm-between p-3 mx-2 mb-2 mt-2 mx-md-5 bgDark border border-secondary border-3 rounded-4";
    form.appendChild(mainDiv);

    // Fonction pour créer un conteneur avec un label et un select
    function createSelectContainer(labelText, selectId, selectName, options) {
        const container = document.createElement("div");
        container.className = "container d-flex flex-column";
        
        const label = document.createElement("label");
        label.htmlFor = selectId;
        label.className = "form-label text-light";
        label.textContent = labelText;
        container.appendChild(label);
        
        const select = document.createElement("select");
        select.className = "form-select fw-bolder rounded-3";
        select.id = selectId;
        select.name = selectName;
        
        options.forEach(optionText => {
            const option = document.createElement("option");
            option.value = optionText;
            option.textContent = optionText;
            select.appendChild(option);
        });
        
        container.appendChild(select);
        return container;
    }

    // Marque options
    const carBrands = [
        'Selectionnez une marque', 'ALPINE', 'AUDI', 'BMW', 'CITROEN', 'DACIA', 'DS', 
        'MERCEDES', 'OPEL', 'PEUGEOT', 'RENAULT', 'WOLKSWAGEN', '_'
    ];
    const carBrandContainer = createSelectContainer('Marque :', 'select_car_brand', 'select_car_brand', carBrands);
    mainDiv.appendChild(carBrandContainer);

    // Modèle options
    const carModels = [
        'Selectionnez un modele', '208', '308', '408', '508', 'A1', 'A110', 'A2', 'A3', 'A4', 
        'A6', 'A8', 'C4', 'CAPTUR', 'CLASSE A', 'CLASSE B', 'CLASSE C', 'CLIO', 'ESPACE', 
        'GOLF', 'i8', 'JOGGER', 'MEGANE', 'MEGANE E-TECH', 'PASSAT', 'POLO', 'Q4 E-TRON', 
        'SANDERO', 'SCENIC', 'SERIE1', 'SIROCCO', 'TWINGO', '_'
    ];
    const carModelContainer = createSelectContainer('Modèle :', 'select_car_model', 'select_car_model', carModels);
    mainDiv.appendChild(carModelContainer);

    // Motorisation options
    const carMotorizations = [
        'Selectionnez une motorisation', 'Essence', 'Diesel', 'Hybride', 'Electrique', '_'
    ];
    const carMotorizationContainer = createSelectContainer('Motorisation :', 'select_car_motorization', 'select_car_motorization', carMotorizations);
    mainDiv.appendChild(carMotorizationContainer);

    // Kms MAX options
    const carMileages = [
        'Selectionnez un kilometrage maxi', '10000', '20000', '30000', '40000', '50000', 
        '60000', '70000', '80000', '90000', '100000', '150000', '200000'
    ];
    const carMileageContainer = createSelectContainer('Kms MAX :', 'select_car_mileage', 'select_car_mileage', carMileages);
    mainDiv.appendChild(carMileageContainer);

    // Prix MAX options
    const carPrices = [
        'Selectionnez un prix maxi', '2500', '5000', '6000', '7000', '8000', '9000', 
        '10000', '12500', '15000', '17500', '20000', '25000', '30000', '35000', '40000', 
        '45000', '50000 € et +'
    ];
    const carPriceContainer = createSelectContainer('Prix MAX :', 'select_car_price', 'select_car_price', carPrices);
    mainDiv.appendChild(carPriceContainer);

    // Conteneur pour le bouton de recherche
    const searchButtonContainer = document.createElement("div");
    searchButtonContainer.className = "container d-flex flex-column w-50 w-sm-25";

    const searchButtonLabel = document.createElement("label");
    searchButtonLabel.htmlFor = "btn-SearchCar";
    searchButtonLabel.className = "form-label text-light text-dark";
    searchButtonLabel.textContent = "Rechercher";
    searchButtonContainer.appendChild(searchButtonLabel);

    const searchButton = document.createElement("button");
    searchButton.className = "btn btn-lg btn-primary px-3 py-2";
    searchButton.type = "submit";
    searchButton.id = "btn-SearchCar";
    searchButton.name = "btn-SearchCar";
    searchButton.textContent = "Rechercher";
    searchButtonContainer.appendChild(searchButton);

    mainDiv.appendChild(searchButtonContainer);

    // Insérer le formulaire au début de la balise <main>
    const mainElement = document.querySelector("main");
    if (mainElement) {
        mainElement.insertBefore(form, mainElement.firstChild);
    } else {
        console.error("La balise <main> n'a pas été trouvée.");
    }

    // Fonction pour créer un article pour chaque voiture
    function createCarArticle(car, index) {
        const article = document.createElement('article');
        article.className = 'mb-5 p-3 border rounded-4';

        const form = document.createElement('form');
        form.action = '/index.php?page=car_edit';
        form.method = 'post';

        const divCarImg = document.createElement('div');
        divCarImg.className = 'd-flex justify-content-center div__Car--img';

        const images = [car.image1, car.image2, car.image3, car.image4, car.image5];

        let myImage = true;

        images.forEach((image) => {
            if (image && myImage) {
                const a = document.createElement("a");
                a.href = '../img/vehicle/' + image;
                a.className = 'popup-gallery';
                a.setAttribute('data-fancybox', 'car-gallery-' + index);

                const img = document.createElement("img");
                img.src = '../img/vehicle/' + image;
                img.alt = "Image du véhicule";
                img.style.width = "350px";

                a.appendChild(img);
                divCarImg.appendChild(a);

                myImage = false;
            } else if (image) {
                const a_ = document.createElement("a");
                a_.href = '../img/vehicle/' + image;
                a_.className = 'popup-gallery';
                a_.setAttribute('data-fancybox', 'car-gallery-' + index);
                divCarImg.append(a_);
            }
        });

        form.append(divCarImg);

        const divCarData = document.createElement('div');
        divCarData.className = 'div__Car--data';

        const table = document.createElement('table');
        table.className = 'table__Car--data';

        const carFields = [
            { label: 'ID:', id: 'id', name: 'txt_carEdit_id', value: car.id_car, type: 'text', class: 'bgDark text-light text-start ps-2', readonly: true },
            { label: 'Marque:', id: 'brand', name: 'txt__Car--Brand', value: car.brand, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Modèle:', id: 'model', name: 'txt__Car--Model', value: car.model, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Moteur:', id: 'motorization', name: 'txt__Car--Motorization', value: car.motorization, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Année:', id: 'year', name: 'txt__Car--year', value: car.year, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Kilomètrage:', id: 'mileage', name: 'txt__Car--mileage', value: `${car.mileage} kms`, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Prix:', id: 'price', name: 'txt__Car--price', value: `${car.price} € TTC`, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Disponible:', id: 'sold', name: 'txt__Car--sold', value: car.sold, type: 'text', class: 'bg-secondary text-light text-start ps-2', readonly: true },
            { label: 'Description:', id: 'description', name: 'txt__Car--description', value: car.description, type: 'textarea', class: 'bg-secondary text-light text-start ps-2', readonly: true }
        ];

        carFields.forEach(field => {
            const tr = document.createElement('tr');

            const tdLabel = document.createElement('td');
            tdLabel.className = 'tdLabel text-end border border-0 pe-1';
            tdLabel.textContent = field.label;

            const tdText = document.createElement('td');
            tdText.className = 'tdText border border-0';

            let input;
            if (field.type === 'textarea') {
                input = document.createElement('textarea');
                input.rows = 3;
                input.placeholder = 'Options et description';
                input.value = field.value;
            } else {
                input = document.createElement('input');
                input.type = field.type;
                input.value = field.value;
            }

            input.id = field.id;
            input.name = field.name;
            input.className = field.class;
            if (field.readonly) {
                input.readOnly = true;
            }

            tdText.appendChild(input);
            tr.appendChild(tdLabel);
            tr.appendChild(tdText);
            table.appendChild(tr);
        });

        divCarData.appendChild(table);
        form.appendChild(divCarData);

        <?php if ($_SESSION['userConnected'] != 'Guest') { ?>
            const editButtonDiv = document.createElement('div');
            editButtonDiv.className = 'd-flex justify-content-center my-2';

            const editButton = document.createElement('button');
            editButton.type = 'submit';
            editButton.className = 'btn btn-primary fs-3 mt-3';
            editButton.id = 'bt__Car--edit';
            editButton.name = 'bt__Car--edit';
            editButton.textContent = 'Editer';

            editButtonDiv.appendChild(editButton);
            form.appendChild(editButtonDiv);
        <?php } ?>

        <?php if ($_SESSION['userConnected'] === 'Guest') { ?>
            const contactButtonDiv = document.createElement('div');
            contactButtonDiv.className = 'd-flex justify-content-center my-2';

            const contactButton = document.createElement('button');
            contactButton.type = 'button';
            contactButton.className = 'btn btn-lg btn-primary';
            contactButton.id = 'bt_car_contact';
            contactButton.textContent = 'Nous contacter';
            contactButton.onclick = function() { focusOnInput(); };

            contactButtonDiv.appendChild(contactButton);
            form.appendChild(contactButtonDiv);
        <?php } ?>

        article.appendChild(form);
        return article;
    }

    // Fonction pour afficher les voitures
    function displayCars(cars) {
        const carSection = document.getElementById('carSection');
        carSection.innerHTML = '';
        cars.forEach((car, index) => {
            const carArticle = createCarArticle(car, index);
            carSection.appendChild(carArticle);
        });
    }

    // Fonction pour filtrer les voitures en fonction de la marque, du modèle et de la motorisation sélectionnés
    function filterCars(cars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice) {
        return cars.filter(car => {
            return (selectedBrand === 'Selectionnez une marque' || car.brand === selectedBrand) &&
                (selectedModel === 'Selectionnez un modele' || car.model === selectedModel) &&
                (selectedMotorization === 'Selectionnez une motorisation' || car.motorization === selectedMotorization) &&
                (selectedMileage === 'Selectionnez un kilometrage maxi' || car.mileage <= selectedMileage) &&
                (selectedPrice === 'Selectionnez un prix maxi' || car.price <= selectedPrice); 
        });
    }

    let allCars = [];

    // Utiliser fetch pour récupérer les données de l'API de manière asynchrone
    fetch('http://garageparrot/api/car.api.php')
        .then(response => response.json())
        .then(data => {
            allCars = data;
            displayCars(allCars);

            // Écouter les changements sur le select de la marque, du modèle et de la motorisation
            document.getElementById('select_car_brand').addEventListener('change', (event) => {
                const selectedBrand = event.target.value;
                const selectedModel = document.getElementById('select_car_model').value;
                const selectedMotorization = document.getElementById('select_car_motorization').value;
                const selectedMileage = document.getElementById('select_car_mileage').value;
                const selectedPrice = document.getElementById('select_car_price').value;
                const filteredCars = filterCars(allCars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice);
                displayCars(filteredCars);
            });

            document.getElementById('select_car_model').addEventListener('change', (event) => {
                const selectedBrand = document.getElementById('select_car_brand').value;
                const selectedModel = event.target.value;
                const selectedMotorization = document.getElementById('select_car_motorization').value;
                const selectedMileage = document.getElementById('select_car_mileage').value;
                const selectedPrice = document.getElementById('select_car_price').value;
                const filteredCars = filterCars(allCars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice);
                displayCars(filteredCars);
            });

            document.getElementById('select_car_motorization').addEventListener('change', (event) => {
                const selectedBrand = document.getElementById('select_car_brand').value;
                const selectedModel = document.getElementById('select_car_model').value;
                const selectedMotorization = event.target.value;
                const selectedMileage = document.getElementById('select_car_mileage').value;
                const selectedPrice = document.getElementById('select_car_price').value;
                const filteredCars = filterCars(allCars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice);
                displayCars(filteredCars);
            });

            document.getElementById('select_car_mileage').addEventListener('change', (event) => {
                const selectedBrand = document.getElementById('select_car_brand').value;
                const selectedModel = document.getElementById('select_car_model').value;
                const selectedMotorization = document.getElementById('select_car_motorization').value;
                const selectedMileage = event.target.value;
                const selectedPrice = document.getElementById('select_car_price').value;
                const filteredCars = filterCars(allCars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice);
                displayCars(filteredCars);
            });

            document.getElementById('select_car_price').addEventListener('change', (event) => {
                const selectedBrand = document.getElementById('select_car_brand').value;
                const selectedModel = document.getElementById('select_car_model').value;
                const selectedMotorization = document.getElementById('select_car_motorization').value;
                const selectedMileage = document.getElementById('select_car_mileage').value;
                const selectedPrice = event.target.value;
                const filteredCars = filterCars(allCars, selectedBrand, selectedModel, selectedMotorization, selectedMileage, selectedPrice);
                displayCars(filteredCars);
            });

        })
        .catch(error => {
            console.log('Error:', error);
        });

    function focusOnInput() {
        document.getElementById('contact_description').value = "Bonjour, je souhaite prendre rendez-vous pour une présentation détaillée et un essai du véhicule xxxxxxxx ";
        document.getElementById('contact_name').focus();
        document.getElementById('bottom').scrollIntoView({ behavior: 'smooth' });
    }
</script>
