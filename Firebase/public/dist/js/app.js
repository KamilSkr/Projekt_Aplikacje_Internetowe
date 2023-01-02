// Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "",
            authDomain: "",
            projectId: "",
            databaseURL: "",
            storageBucket: "",
            messagingSenderId: "",
            appId: "",
            measurementId: ""
          };
          // Initialize Firebase
          firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

const database = firebase.database();

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
const thingsList = document.getElementById('thingsList');
const imie = document.getElementById('imie');



let thingsRef;
let saveDB;

auth.onAuthStateChanged(user => {

    if (user) {

        // Database Reference
        thingsRef = db.collection('things')

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
        saveDB = thingsRef
            .where('uid', '==', user.uid)
            .orderBy('createdAt') // Requires a query
            .onSnapshot(querySnapshot => {

                // Map results to an array of li elements

                const items = querySnapshot.docs.map(doc => {

                    return `<li>${doc.data().name},
                    ${doc.data().names},
                    ${doc.data().imie},
                    ${doc.data().country}
                    </li>`

                });

                thingsList.innerHTML = items.join('');

            });



    } else {
        // saveDB when the user signs out
        saveDB && saveDB();
    }
});




  ///Zapis do RDB

  const usersRef = database.ref('/users');
  const userId = document.getElementById('userId');
  const firstName = document.getElementById('firstName');
  const lastName = document.getElementById('lastName');
  const age = document.getElementById('age');
  const addBtn = document.getElementById('addBtn');
  const updateBtn = document.getElementById('updateBtn');
  const removeBtn = document.getElementById('removeBtn');




// Zapis do bazy

addBtn.addEventListener('click', e => {
  e.preventDefault();
  const autoId = usersRef.push().key
  usersRef.child(userId.value).set({
    first_name: firstName.value,
    last_name: lastName.value,
    age: age.value
  });
});

// Aktualizacja bazy


updateBtn.addEventListener('click', e => {
  e.preventDefault();
  const newData = {
      first_name: firstName.value,
      last_name: lastName.value,
      age: age.value
  };
  const autoId = usersRef.push().key;
  const updates = {};
  updates['/users/' + userId.value] = newData;
  updates['/super-users/' + userId.value] = newData;
  database.ref().update(updates);
});

// Usunac dane

removeBtn.addEventListener('click', e => {
    e.preventDefault();
    usersRef.child(userId.value).remove()
    .then(()=> { console.log('User Deleted !'); })
    .catch(error => { console.error(error); });
});
