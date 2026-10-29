import { StyleSheet, Text, View } from 'react-native';

export default function WelcomeScreen({ route }) {
  const nome = route.params.nome;
  const idade = route.params.idade;
  return (
    <View style={styles.container}>
      <Text style={styles.texto01}> Sr. {nome}</Text>
      <Text style={idade > 0 ? styles.idadeMaiorZero : styles.idadeMenorZero}>
        Idade: {idade}
      </Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  texto01: {
    color: 'blue',
    backgroundColor: 'grey',
  },
  texto02: {
    color: 'blue',
    backgroundColor: 'grey',
  },
  idadeMaiorZero: {
    color: 'green',
    backgroundColor: 'black',
  },
  idadeMenorZero: {
    color: 'red',
    backgroundColor: 'black',
  },
});
