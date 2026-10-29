import { useState } from 'react';
import { StyleSheet, TextInput, Button } from 'react-native';
import { SafeAreaView, SafeAreaProvider } from 'react-native-safe-area-context';

import firebase from '../config/firebaseConfig';

const alunoRef = firebase.database().ref('alunos');

const AlunoForm = ({ navigation, route }) => {
  const data = route.params?.item || '';

  const [nome, setNome] = useState(data.nome || '');
  const [idade, setIdade] = useState(data.idade || '');

  const salvar = () => {
    const dataForm = { nome: nome, idade: idade };

    if (data.id) {
      alunoRef.child(data.id).update(dataForm);
    } else {
      alunoRef.push({ ...dataForm, criadoEm: Date.now() });
    }

    // alert('Nome: ' + nome + ' Idade: ' + idade);

    navigation.navigate('AlunoList');
  };

  return (
    <SafeAreaProvider>
      <SafeAreaView>
        <TextInput
          style={styles.input}
          onChangeText={setNome}
          placeholder="Informe seu nome"
          value={nome}
        />
        <TextInput
          style={styles.input}
          onChangeText={setIdade}
          value={idade}
          placeholder="20"
          keyboardType="numeric"
        />
        <Button
          title={data.id ? 'Atualizar' : 'Salvar'}
          color="#2f2a3d"
          onPress={salvar}></Button>
        <Button
          title="Voltar"
          color="#2f2a3d"
          onPress={() => navigation.navigate('AlunoList')}></Button>
      </SafeAreaView>
    </SafeAreaProvider>
  );
};

const styles = StyleSheet.create({
  input: {
    height: 40,
    margin: 12,
    borderWidth: 1,
    padding: 10,
  },
});

export default AlunoForm;
