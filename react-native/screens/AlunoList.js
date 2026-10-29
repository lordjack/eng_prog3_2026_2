import { useState, useEffect } from 'react';
import {
  FlatList,
  StatusBar,
  StyleSheet,
  Text,
  TouchableOpacity,
  TextInput,
} from 'react-native';
import { SafeAreaView, SafeAreaProvider } from 'react-native-safe-area-context';
import { FAB } from 'react-native-paper';

import firebase from '../config/firebaseConfig';

const alunoRef = firebase.database().ref('alunos');

const AlunoList = ({ navigation }) => {
  const [selectedId, setSelectedId] = useState();
  const [alunos, setAlunos] = useState([]);
  const [buscar, setBuscar] = useState('');

  useEffect(() => {
    const onReceberDados = (snapshot) => {
      const dados = snapshot.val() || {};
      const lista = Object.keys(dados).map((id) => ({
        id,
        ...dados[id],
      }));
      setAlunos(lista);
    };

    alunoRef.on('value', onReceberDados);
    return () => alunoRef.off('value', onReceberDados);
  }, []);

  const excluir = (id, nome) => {
    if (confirm('Deseja Excluir ' + nome + '?')) {
      alunoRef.child(id).remove();
    }
  };

  const alunosFiltrados = alunos.filter((item) =>
    (item.nome || '').toLowerCase().includes(buscar.toLowerCase())
  );

  const renderItem = ({ item }) => {
    const backgroundColor = item.id === selectedId ? '#6e3b6e' : 'grey';
    const color = item.id === selectedId ? 'white' : 'black';
    return (
      <TouchableOpacity
        onPress={() => navigation.navigate('AlunoForm', { item })}
        onLongPress={() => excluir(item.id, item.nome)}
        style={[styles.item, { backgroundColor }]}>
        <Text style={[styles.nome, { color: color }]}>
          {item.nome} - Idade: {item.idade}
        </Text>
      </TouchableOpacity>
    );
  };

  return (
    <SafeAreaProvider>
      <SafeAreaView style={styles.container}>
        <TextInput
          style={styles.input}
          onChangeText={setBuscar}
          placeholder="Pesquisar"
          value={buscar}
        />
        <FlatList
          data={alunosFiltrados}
          renderItem={renderItem}
          keyExtractor={(item) => item.id}
          extraData={selectedId}
        />
        <FAB
          icon="plus"
          style={styles.fab}
          onPress={() => navigation.navigate('AlunoForm')}
        />
      </SafeAreaView>
    </SafeAreaProvider>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: StatusBar.currentHeight || 0,
  },
  input: {
    height: 40,
    margin: 12,
    borderWidth: 1,
    padding: 10,
  },
  item: {
    padding: 10,
    marginVertical: 8,
    marginHorizontal: 16,
  },
  nome: {
    fontSize: 22,
  },
  fab: {
    position: 'absolute',
    margin: 16,
    right: 0,
    bottom: 0,
  },
});

export default AlunoList;
