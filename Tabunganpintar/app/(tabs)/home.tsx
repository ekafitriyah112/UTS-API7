import { Image, StyleSheet, Text, View, TouchableOpacity, TextInput } from 'react-native'; 
import React from 'react';
import { Ionicons } from '@expo/vector-icons'; 
import Colors from "@/constants/Colors"; // Pastikan path Colors benar
import { useHeaderHeight } from '@react-navigation/elements';

const Page = () => { 
  const headerHeight = useHeaderHeight();
  return (
    <View style={[styles.container, { paddingTop: headerHeight }]}>
      <Text style={styles.headingTxt}>Tabungan Pintar</Text>

      <View style={styles.searchSectionWrapper}>
        <View style={styles.search}>
          <Ionicons name="search" size={18} style={{ marginRight: 5 }} color={Colors.black} />
          <TextInput 
            placeholder="Search..."
            style={styles.input}
          />   
        </View>
        <TouchableOpacity onPress={() => {}} style={styles.filterBtn}>
          <Ionicons name="options" size={28} color={Colors.black} />
        </TouchableOpacity>
      </View>
    </View>
  );
};

export default Page;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingHorizontal: 20,
    backgroundColor: Colors.bgColor,
  },
  headingTxt: { 
    fontSize: 28,
    fontWeight: '800',
    color: Colors.black,
    marginTop: 20,
  },
  searchSectionWrapper: {
    flexDirection: 'row',
    marginVertical: 20,
    alignItems: 'center',
  },
  search: {
    flexDirection: 'row',
    flex: 1,
    backgroundColor: Colors.white,
    padding: 12,
    borderRadius: 10,
    marginRight: 10,
  },
  input: {
    flex: 1,
    marginLeft: 10,
    fontSize: 16,
  },
  filterBtn: {
    padding: 10,
    backgroundColor: Colors.primaryColor,
    borderRadius: 10,
    marginLeft: 20,
  }
});
