import sys
import json
import networkx as nx
from networkx.algorithms.approximation import traveling_salesman_problem, christofides

def haversine(coord1, coord2):
    from math import radians, cos, sin, asin, sqrt
    lon1, lat1 = coord1
    lon2, lat2 = coord2
    lon1, lat1, lon2, lat2 = map(radians, [lon1, lat1, lon2, lat2])
    dlon = lon2 - lon1
    dlat = lat2 - lat1
    a = sin(dlat/2)**2 + cos(lat1)*cos(lat2)*sin(dlon/2)**2
    c = 2*asin(sqrt(a))
    return 6371 * c  # km

def main():
    data = json.loads(sys.stdin.read())
    points = data["points"]

    G = nx.complete_graph(len(points))
    for i in G.nodes:
        for j in G.nodes:
            if i != j:
                G[i][j]["weight"] = haversine(points[i], points[j])

    path = traveling_salesman_problem(G, cycle=True, method=christofides)
    print(json.dumps({"order": path}))

if __name__ == "__main__":
    main()
