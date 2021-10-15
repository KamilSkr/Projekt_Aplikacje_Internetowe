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

const team_squad = document.getElementById('team_squad');
const tbody1 = document.getElementById('tbody1');
const imie = document.getElementById('namep');
const surnamep = document.getElementById('surnamep');
const datap = document.getElementById('datap');
const numberp = document.getElementById('numberp');
const positionp = document.getElementById('positionp');
const edit = document.getElementById('');



let thingsSquad;
let saveSquad;
let updateSquad;

auth.onAuthStateChanged(user => {

    if (user) {

        // Database Reference
        thingsSquad = db.collection('squad')

        team_squad.onclick = () => {

            const { serverTimestamp } = firebase.firestore.FieldValue;

            thingsSquad.add({
                uid: user.uid,
                createdAt: serverTimestamp(),
                imie: imie.value,
                nazwisko: surnamep.value,
                data: datap.value,
                numer: numberp.value,
                pozycja: positionp.value
            });
        }




        // Query
        saveSquad = thingsSquad
            .where('uid', '==', user.uid)
            .orderBy('createdAt') // Requires a query
            .onSnapshot(querySnapshot => {

                // Map results to an array of li elements

                const items = querySnapshot.docs.map(doc => {

                    return  `<tr>
                    <th>${doc.data().numer}</th>
                    <th>${doc.data().imie}</th>
                    <th>${doc.data().nazwisko}</th>
                    <th>${doc.data().pozycja}</th>
                    <th>${doc.data().data}</th>
                            </tr>`

                });

                tbody1.innerHTML = items.join('');

            });


            updateSquad = db.collection('squad')

            updateSquad.onclick = () => {

            const { serverTimestamp } = firebase.firestore.FieldValue;

            thingsSquad.update({
                uid: user.uid,
                createdAt: serverTimestamp(),
                imie: imie.value,
                nazwisko: surnamep.value,
                data: datap.value,
                numer: numberp.value,
                pozycja: positionp.value
            });
        }


    } else {
        // saveSquad when the user signs out
        saveSquad && saveSquad();
    }
});



// Set database variable
const database = firebase.database()

function save() {
    var email = document.getElementById('email').value
    var password = document.getElementById('password').value
    var username = document.getElementById('username').value
    var say_something = document.getElementById('say_something').value
    var favourite_food = document.getElementById('favourite_food').value

    database.ref('users/' + username).set({
      email : email,
      password : password,
      username : username,
      say_something : say_something,
      favourite_food : favourite_food
    })

    alert('Saved')
  }

  function get() {
    var username = document.getElementById('username').value

    var user_ref = database.ref('users/' + username)
    user_ref.on('value', function(snapshot) {
      var data = snapshot.val()

      alert(data.email)

    })

  }

  function update() {
    var username = document.getElementById('username').value
    var email = document.getElementById('email').value
    var password = document.getElementById('password').value

    var updates = {
      email : email,
      password : password
    }

    database.ref('users/' + username).update(updates)

    alert('updated')
  }

  function remove() {
    var username = document.getElementById('username').value

    database.ref('users/' + username).remove()

    alert('deleted')
  }

  ///Zapis do DB zawodnikow , widocznosc elementu dodawania zawodnikow

  function toggle(sDivId) {
    var oDiv = document.getElementById(sDivId);
    oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";
}