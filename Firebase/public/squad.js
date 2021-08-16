// Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyB8vgjmPbmopzA5bLRPap6HUB4buDR6dQs",
            authDomain: "app-trener.firebaseapp.com",
            projectId: "app-trener",
            storageBucket: "app-trener.appspot.com",
            messagingSenderId: "190255082198",
            appId: "1:190255082198:web:af25e9915ea21bc9d37777",
            measurementId: "G-WC5NKM5DX1"
          };
          // Initialize Firebase
          firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

const whenSignedIn = document.getElementById('whenSignedIn');
const whenSignedOut = document.getElementById('whenSignedOut');

const signInBtn = document.getElementById('signInBtn');
const signOutBtn = document.getElementById('signOutBtn');

const userDetails = document.getElementById('userDetails');
const wrapper = document.getElementById('wrapper');
const thingsShow = document.getElementById('thingsShow');

const provider = new firebase.auth.GoogleAuthProvider();

/// Sign in event handlers

signInBtn.onclick = () => auth.signInWithPopup(provider);

signOutBtn.onclick = () => auth.signOut();

auth.onAuthStateChanged(user => {
    if (user) {
        // signed in
        whenSignedIn.hidden = false;
        whenSignedOut.hidden = true;
        wrapper.hidden = false;
        thingsShow.hidden = false;
        // userDetails.innerHTML = `<h3>Hello ${user.displayName}!</h3> <p>User ID: ${user.uid}</p>`;
    } else {
        // not signed in
        whenSignedIn.hidden = true;
        wrapper.hidden = true;
        whenSignedOut.hidden = false;
        thingsShow.hidden = true;
        userDetails.innerHTML = '';
    }
});



///// Firestore /////

const db = firebase.firestore();

const createThing = document.getElementById('createThing');
const tbody1 = document.getElementById('tbody1');
const imie = document.getElementById('imie');



let thingsRef;
let saveSquad;

auth.onAuthStateChanged(user => {

    if (user) {

        // Database Reference
        thingsRef = db.collection('squad')

        createThing.onclick = () => {

            const { serverTimestamp } = firebase.firestore.FieldValue;

            thingsRef.add({
                uid: user.uid,
                name: faker.commerce.productName(),
                createdAt: serverTimestamp(),
                names: "Los Angeless",
                state: "CAs",
                country: "USAs",
                imie: imie.value
            });
        }




        // Query
        saveSquad = thingsRef
            .where('uid', '==', user.uid)
            .orderBy('createdAt') // Requires a query
            .onSnapshot(querySnapshot => {

                // Map results to an array of li elements

                const items = querySnapshot.docs.map(doc => {

                    return  `<td>${doc.data().name}</td>
                    <td>${doc.data().names}</td>
                    <td>${doc.data().imie}</td>`

                });

                tbody1.innerHTML = items.join('');

            });



    } else {
        // saveSquad when the user signs out
        saveSquad && saveSquad();
    }
});

var ractive = new Ractive({
    el: '#container',
    template: '#template',
    data: {}
  });


  ///Zapis do DB zawodnikow

