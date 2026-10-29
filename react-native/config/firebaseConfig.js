import firebase from 'firebase';

const firebaseConfig = {
  apiKey: 'AIzaSyCZAgRTvUZbeqiIw4ya8DwZhdJyTrS8siY',
  authDomain: 'poe-2024-2-crud.firebaseapp.com',
  databaseURL: 'https://poe-2024-2-crud-default-rtdb.firebaseio.com',
  projectId: 'poe-2024-2-crud',
  storageBucket: 'poe-2024-2-crud.firebasestorage.app',
  messagingSenderId: '327049611501',
  appId: '1:327049611501:web:2b3550a618f6da7161e4e4',
};

if (!firebase.apps.length) {
  firebase.initializeApp(firebaseConfig);
}

export default firebase;
